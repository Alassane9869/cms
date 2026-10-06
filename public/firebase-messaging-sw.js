importScripts('https://www.gstatic.com/firebasejs/10.13.2/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/10.13.2/firebase-messaging-compat.js');

firebase.initializeApp({
    apiKey: 'AIzaSyDjq5_Y8VX0OwvbmKXPhHZUlOhHAWolvfQ',
    authDomain: 'cmss-gestion-reclamations.firebaseapp.com',
    projectId: 'cmss-gestion-reclamations',
    storageBucket: 'cmss-gestion-reclamations.firebasestorage.app',
    messagingSenderId: '975033909118',
    appId: '1:975033909118:web:31ee1d1745f3527e2ebd2f',
});

firebase.messaging().onBackgroundMessage((payload) => {
    const notification = payload.notification || {};
    self.registration.showNotification(notification.title || 'CMSS', {
        body: notification.body || 'Mise à jour de votre réclamation.',
        icon: '/images/logo.jpg',
    });
});
