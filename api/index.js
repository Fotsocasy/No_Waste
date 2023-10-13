const express = require('express');
const app = express();
const PORT = 5000; // Set your desired port number here
const YOUR_IP_ADDRESS = '172.20.10.3'; // Replace with your machine's IP address
const mysql = require('mysql');
require('dotenv').config();

const dbConnection = mysql.createConnection({
  host: process.env.DB_HOST,
  user: process.env.DB_USER,
  password: process.env.DB_PASSWORD,
  database: process.env.DB_DATABASE,
});

app.use(express.json());

app.get('/live-data/:data', (req, res) => {
  const data = req.params.data; // Retrieve data sent by the Arduino
  console.log(data+"%");

  const insertQuery = 'UPDATE poubelles SET niveau = ? WHERE idPoubelle = 1';

  dbConnection.query(insertQuery, [data], (err, result) => {
    if (err) {Ò
      console.error('Error inserting data into the database:', err);
      res.status(500).send('Error processing data');
    } else {
      console.log('Data received and inserted into the database');
      res.send('Data received and processed.');
    }
  });
});

app.listen(PORT, YOUR_IP_ADDRESS, () => {
  console.log(`Server is running on ${YOUR_IP_ADDRESS}:${PORT}`);
});