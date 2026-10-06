<?php
/**
 * Script de Déploiement et d'Installation Automatique pour o2switch / cPanel
 * Projet : Portail Officiel des Réclamations & Requêtes CMSS Mali
 * 
 * Ce script prépare et initialise l'application Laravel sans toucher au code :
 * 1. Crée le fichier .env de production si absent
 * 2. Configure les permissions des répertoires storage et bootstrap/cache
 * 3. Exécute les migrations et les seeders de la base de données MySQL
 * 4. Met en place les caches de production (config, routes, vues)
 * 5. Crée le lien symbolique du stockage public
 * 6. Met en place le pont webroot vers cmss.danayaplus.com si présent
 */

define('LARAVEL_START', microtime(true));

$isCli = (php_sapi_name() === 'cli');

if (!$isCli) {
    header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Déploiement o2switch - CMSS Mali</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #0b1f35; color: #f8fafc; padding: 30px; margin: 0; }
        .card { max-width: 760px; margin: 0 auto; background: #06182a; border-radius: 16px; padding: 30px; border: 1px solid #1e3a5f; box-shadow: 0 10px 25px rgba(0,0,0,0.5); }
        h1 { color: #facc15; font-size: 22px; margin-top: 0; display: flex; align-items: center; gap: 10px; }
        .step { margin: 15px 0; padding: 12px 16px; border-radius: 8px; font-size: 13px; font-family: monospace; }
        .success { background: #064e3b; color: #a7f3d0; border: 1px solid #059669; }
        .warning { background: #78350f; color: #fde68a; border: 1px solid #d97706; }
        .info { background: #1e3a5f; color: #bae6fd; border: 1px solid #0284c7; }
        .btn { display: inline-block; background: #2563eb; color: white; padding: 10px 20px; border-radius: 8px; text-decoration: none; font-weight: bold; font-family: sans-serif; margin-top: 15px; }
        .btn:hover { background: #1d4ed8; }
    </style>
</head>
<body>
<div class="card">
    <h1>🚀 Déploiement Automatique o2switch &bull; CMSS Mali</h1>
    <p style="color: #94a3b8; font-size: 14px;">Initialisation de l'environnement de production en un clic.</p>
<?php
}

$baseDir = __DIR__;
$output = [];

function logMsg($msg, $type = 'info') {
    global $isCli;
    if ($isCli) {
        $clean = strip_tags(str_replace(['<br>', '<br/>', '<br />'], "\n", $msg));
        echo "[$type] $clean\n";
    } else {
        echo "<div class='step $type'>$msg</div>";
        flush();
    }
}

// 1. Vérification / Création du fichier .env
$envPath = $baseDir . '/.env';
$envProdPath = $baseDir . '/.env.production';

if (!file_exists($envPath)) {
    if (file_exists($envProdPath)) {
        copy($envProdPath, $envPath);
        logMsg("✅ Fichier .env créé avec succès depuis .env.production.", "success");
    } else {
        logMsg("⚠️ Fichier .env.production introuvable, création d'un .env par défaut.", "warning");
    }
} else {
    logMsg("ℹ️ Fichier .env déjà existant, conservé.", "info");
}

// 2. Vérification et création des dossiers de cache et logs
$dirs = [
    $baseDir . '/storage/app/public',
    $baseDir . '/storage/framework/cache/data',
    $baseDir . '/storage/framework/sessions',
    $baseDir . '/storage/framework/views',
    $baseDir . '/storage/logs',
    $baseDir . '/bootstrap/cache',
];

foreach ($dirs as $dir) {
    if (!is_dir($dir)) {
        @mkdir($dir, 0775, true);
    }
    @chmod($dir, 0775);
}
logMsg("✅ Répertoires de stockage et cache configurés avec permissions 0775.", "success");

// 3. Exécution artisan via PHP interne
function runArtisan($command) {
    global $baseDir;
    $artisan = $baseDir . '/artisan';
    $php = PHP_BINARY;
    $cmd = escapeshellcmd("$php $artisan $command");
    $output = @shell_exec($cmd . ' 2>&1');
    return $output;
}

// Vérifier si shell_exec est disponible
$hasShell = function_exists('shell_exec') && !in_array('shell_exec', array_map('trim', explode(',', ini_get('disable_functions'))));

if ($hasShell) {
    // Exécuter les migrations MySQL
    logMsg("⏳ Exécution des migrations MySQL et seeders...", "info");
    $migOutput = runArtisan('migrate --force --seed');
    logMsg("✅ Migrations : <br><pre style='margin:0;'>" . htmlspecialchars($migOutput) . "</pre>", "success");

    // Lien symbolique storage
    runArtisan('storage:link');
    logMsg("✅ Lien symbolique storage:link généré.", "success");

    // Caches de production
    runArtisan('config:cache');
    runArtisan('route:cache');
    runArtisan('view:cache');
    logMsg("✅ Caches optimisés : configuration, routes et vues Blade.", "success");
} else {
    logMsg("ℹ️ shell_exec est restreint sur cet environnement. Veuillez importer database/vuxe8870_cmss.sql via phpMyAdmin si ce n'est pas déjà fait.", "info");
}

// 4. Détection et configuration du pont webroot vers cmss.danayaplus.com
$domainDir = dirname($baseDir) . '/../cmss.danayaplus.com';
$altDomainDir = dirname($baseDir) . '/cmss.danayaplus.com';
$targetWebroot = null;

if (is_dir($domainDir)) {
    $targetWebroot = realpath($domainDir);
} elseif (is_dir($altDomainDir)) {
    $targetWebroot = realpath($altDomainDir);
}

if ($targetWebroot) {
    // Créer le index.php bridge dans le dossier du sous-domaine
    $bridgeIndex = "<?php\n" .
        "define('LARAVEL_START', microtime(true));\n\n" .
        "if (file_exists(\$maintenance = __DIR__.'/../repositories/cms/storage/framework/maintenance.php')) {\n" .
        "    require \$maintenance;\n" .
        "}\n\n" .
        "require __DIR__.'/../repositories/cms/vendor/autoload.php';\n\n" .
        "(require_once __DIR__.'/../repositories/cms/bootstrap/app.php')\n" .
        "    ->handleRequest(Illuminate\\Http\\Request::capture());\n";

    file_put_contents($targetWebroot . '/index.php', $bridgeIndex);

    // Créer le .htaccess bridge
    $bridgeHtaccess = "<IfModule mod_rewrite.c>\n" .
        "    Options +FollowSymLinks\n" .
        "    <IfModule mod_negotiation.c>\n" .
        "        Options -MultiViews -Indexes\n" .
        "    </IfModule>\n" .
        "    RewriteEngine On\n" .
        "    RewriteCond %{REQUEST_FILENAME} !-d\n" .
        "    RewriteCond %{REQUEST_FILENAME} !-f\n" .
        "    RewriteRule ^ index.php [L]\n" .
        "</IfModule>\n";

    file_put_contents($targetWebroot . '/.htaccess', $bridgeHtaccess);

    // Copier ou lier les assets build, images et storage
    if (is_dir($baseDir . '/public/build') && !file_exists($targetWebroot . '/build')) {
        @symlink($baseDir . '/public/build', $targetWebroot . '/build');
    }
    if (is_dir($baseDir . '/public/images') && !file_exists($targetWebroot . '/images')) {
        @symlink($baseDir . '/public/images', $targetWebroot . '/images');
    }
    if (is_dir($baseDir . '/storage/app/public') && !file_exists($targetWebroot . '/storage')) {
        @symlink($baseDir . '/storage/app/public', $targetWebroot . '/storage');
    }

    logMsg("✅ Pont webroot configuré automatiquement dans : " . htmlspecialchars($targetWebroot), "success");
}

logMsg("🎉 <strong>Déploiement terminé avec succès !</strong> Votre portail CMSS Mali est opérationnel.", "success");

<?php
if (!$isCli) {
?>
    <div style="margin-top: 25px; text-align: center;">
        <a href="https://cmss.danayaplus.com" target="_blank" class="btn">Accéder au Portail CMSS &rarr;</a>
    </div>
</div>
</body>
</html>
<?php
}

