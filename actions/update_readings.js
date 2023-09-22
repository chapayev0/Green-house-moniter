 // Firebase configuration
 const firebaseConfig = {
    apiKey: 'AIzaSyByuqoOaiidBYFLN42wNNAawiYPvbG0h6k',
    authDomain: 'smart-grow-aea93.firebaseapp.com',
    databaseURL: 'https://smart-grow-aea93-default-rtdb.firebaseio.com',
    projectId: 'smart-grow-aea93',
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// Reference to the Firebase Realtime Database
const database = firebase.database();

// Path to the data you want to monitor
const pathToData = 'sensor_readings';

// Set up a listener for real-time updates
database.ref(pathToData).on('value', (snapshot) => {
    const data = snapshot.val();
    // Update an HTML element with the new data
    document.getElementById('data-display').innerText = data;
});


setInterval(() => {
    // Trigger a database query or update here
}, 5000); // 5000 milliseconds = 5 seconds