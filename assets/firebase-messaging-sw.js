// Import and configure the Firebase SDK
// These scripts are made available when the app is served or deployed on Firebase Hosting
// If you do not serve/host your project using Firebase Hosting see https://firebase.google.com/docs/web/setup
//importScripts('/__/firebase/7.14.0/firebase-app.js');
//importScripts('/__/firebase/7.14.0/firebase-messaging.js');
//importScripts('/__/firebase/init.js');
//https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js
//importScripts('https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js');
//importScripts('https://www.gstatic.com/firebasejs/7.14.0/firebase-messaging.js');
//importScripts('https://www.gstatic.com/firebasejs/firebase/init.js');


 //* Here is is the code snippet to initialize Firebase Messaging in the Service
 //* Worker when your app is not hosted on Firebase Hosting.

 // [START initialize_firebase_in_sw]
 // Give the service worker access to Firebase Messaging.
 // Note that you can only use Firebase Messaging here, other Firebase libraries
 // are not available in the service worker.
 importScripts('https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js');
 importScripts('https://www.gstatic.com/firebasejs/7.14.0/firebase-messaging.js');

 // Initialize the Firebase app in the service worker by passing in
 // your app's Firebase config object.
 // https://firebase.google.com/docs/web/setup#config-object
  
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyCkDQ7E7bFJ9JgKkGnsMIhYpMeZgi23lqc",
    authDomain: "pwa-foodapp.firebaseapp.com",
    databaseURL: "https://pwa-foodapp.firebaseio.com",
    projectId: "pwa-foodapp",
    storageBucket: "pwa-foodapp.appspot.com",
    messagingSenderId: "479537641272",
    appId: "1:479537641272:web:b7f1bedf90881e6be533cd"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

 // Retrieve an instance of Firebase Messaging so that it can handle background
 // messages.
 const messaging = firebase.messaging();
 // [END initialize_firebase_in_sw]
 


// If you would like to customize notifications that are received in the
// background (Web app is closed or not in browser focus) then you should
// implement this optional method.
// [START background_handler]
messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  const notificationTitle = 'Background Message Title';
  const notificationOptions = {
    body: 'Background Message body.',
    icon: 'img/logo-icons/logo-96.png'
  };

  return self.registration.showNotification(notificationTitle,
    notificationOptions);
});
// [END background_handler]
