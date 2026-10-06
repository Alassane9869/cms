import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const firebaseConfig = {
	apiKey: 'AIzaSyDjq5_Y8VX0OwvbmKXPhHZUlOhHAWolvfQ',
	authDomain: 'cmss-gestion-reclamations.firebaseapp.com',
	projectId: 'cmss-gestion-reclamations',
	storageBucket: 'cmss-gestion-reclamations.firebasestorage.app',
	messagingSenderId: '975033909118',
	appId: '1:975033909118:web:31ee1d1745f3527e2ebd2f',
};

async function registerPushNotifications() {
	if (!('Notification' in window) || !('serviceWorker' in navigator)) return;

	const permission = await Notification.requestPermission();
	if (permission !== 'granted') return;

	const { initializeApp } = await import('firebase/app');
	const { getMessaging, getToken } = await import('firebase/messaging');
	const app = initializeApp(firebaseConfig);
	const messaging = getMessaging(app);
	const registration = await navigator.serviceWorker.register('/firebase-messaging-sw.js');
	const token = await getToken(messaging, {
		vapidKey: import.meta.env.VITE_FCM_VAPID_KEY || 'BD9bMuBf5fadtuQYBLPvG0uoPgwc258b10wcJzlVXG0TABoC9nHAjUKulluviX5DpXSC1nOMa59nD2-6llETBfk',
		serviceWorkerRegistration: registration,
	});

	if (!token) return;

	await fetch('/push-token', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json',
			'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
			'Accept': 'application/json',
		},
		body: JSON.stringify({ token }),
	});
}

if (document.querySelector('meta[name="csrf-token"]')) {
	registerPushNotifications().catch(() => {});
}
