const express = require('express');
const app = express();
const PORT = 5000; // Set your desired port number here
const YOUR_IP_ADDRESS = '172.20.10.3'; // Replace with your machine's IP address

app.use(express.json());

app.get('/live-data/:data', (req, res) => {
  const data = req.params.data; // Retrieve data sent by the Arduino
  // Handle the data as needed, e.g., store it in a database, perform actions, or send a response to the Arduino.
  console.log(data);
  res.send('Data received and processed.');
});

app.listen(PORT, YOUR_IP_ADDRESS, () => {
  console.log(`Server is running on ${YOUR_IP_ADDRESS}:${PORT}`);
});
