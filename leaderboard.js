// ==========================================================================
// leaderboard.js - Firebase Realtime Leaderboard Sync
// ==========================================================================

const firebaseConfig = {
  apiKey: "AIzaSyDguvGwMNqADw8vC2877IDvoxmnTvj1txU",
  authDomain: "inovasi-stem-lahan-basah.firebaseapp.com",
  databaseURL: "https://inovasi-stem-lahan-basah-default-rtdb.firebaseio.com",
  projectId: "inovasi-stem-lahan-basah",
  storageBucket: "inovasi-stem-lahan-basah.appspot.com",
  messagingSenderId: "853863316290",
  appId: "1:853863316290:web:721e94519c84e725f1a6db"
};

// Check if firebase is already initialized
if (!firebase.apps.length) {
  firebase.initializeApp(firebaseConfig);
}
const db = firebase.database();
