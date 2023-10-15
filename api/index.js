const express = require("express");
const app = express();
const mysql = require('mysql');
const nodemailer = require('nodemailer');
const hbs = require('nodemailer-express-handlebars')
const path = require('path')

require('dotenv').config();

const PORT = process.env.PORT;
const YOUR_IP_ADDRESS = process.env.IP;
const mailTo ='casyrose237@gmail.com';
const dbConnection = mysql.createConnection({
  host: process.env.DB_HOST,
  user: process.env.DB_USER,
  password: process.env.DB_PASSWORD,
  database: process.env.DB_DATABASE,
});

///////////////////////////////////////////////
///////////////////////////////////////////////
// initialize nodemailer
var transporter2 = nodemailer.createTransport(
  {
      service: 'gmail',
      auth:{
          user: mailTo,
          pass: 'iutk qhva uqul wrij'
      }
  }
);

// point to the template folder
const handlebarOptions = {
  viewEngine: {
      partialsDir: path.resolve('./views/'),
      defaultLayout: false,
  },
  viewPath: path.resolve('./views/'),
};

// use a template file with nodemailer
transporter2.use('compile', hbs(handlebarOptions))

const initMail = async () => {
  const mailOptions = {
    from: mailTo, // sender address
    template: "email", // the name of the template file, i.e., email.handlebars
    to: "casyfotso@gmail.com",
    subject: `No Waste Project - Initialisation Email`,
    context: {
      name: "Admin",
      message: 'Project started successfully'
    },
  };
    try {
      await transporter2.sendMail(mailOptions);
      console.log("Email sent")
    } catch (error) {
      console.log(`Nodemailer error sending email to casyfotso@gmail.com`, error);
    }
}
const sendMail = async (data) => {
  const mailOptions = {
  from: mailTo, // sender address
  template: "email", // the name of the template file, i.e., email.handlebars
  to: "casyfotso@gmail.com",
  subject: `Urgent: Dustbin Full at ${data}%`,
  context: {
    name: "Admin",
    message: `
    Your dustbin, labeled "Dustbin ID:"Poubelle 1", has reached full capacity, currently standing at ${data}%.
    
    Immediate action is required to maintain cleanliness and functionality. Please empty and clean the dustbin as soon as possible.
    
    Thank you for your prompt attention to this matter.
    
    Best regards,
    FOTSO Casy Rose
    `
  },
};
  try {
    await transporter2.sendMail(mailOptions);
    console.log("Email sent")
  } catch (error) {
    console.log(`Nodemailer error sending email to casyfotso@gmail.com`, error);
  }
}

///////////////////////////////////////////////
///////////////////////////////////////////////

// Create a nodemailer transporter for sending emails
const transporter = nodemailer.createTransport({
  host: process.env.SMTP_HOST, 
  port: 465, 
  secure: false,
  auth: {
    user: process.env.SMTP_USER,
    pass: process.env.SMTP_PASSWORD,
  },
});

let previousData = null; // Store the previous data value
let dataCount = 1;

app.use(express.json());

app.get("/live-data/:data", async(req, res) => {
  const data = req.params.data; // Retrieve data sent by the Arduino
  console.log(data + "%");

  const insertQuery = "UPDATE poubelles SET niveau = ? WHERE idPoubelle = 1";

  // Check if the data is in the range of 96% to 100%
  if (data >= 90 && data <= 100) {
    // If it is, and it's the same as the previous data, send an email
    if (data === previousData) {
      setTimeout(()=>{
        dataCount++;
        console.log('dataCount = '+dataCount)
      },30000)
      
      /* const mailOptions = {
        from: process.env.SMTP_USER,
        to: mailTo,
        subject: 'High Fill Level Alert',
        text: 'The fill level is high and remains unchanged: ' + data + '%',
      }; */

      /* transporter.sendMail(mailOptions, (error, info) => {
        if (error) {
          console.log('Error sending email: ' + error);
        } else {
          console.log('Email sent: ' + info.response);
        }
      }); */
      if(dataCount%40 === 0){
        await sendMail(data);
        dataCount=1
      }

    }else{
      dataCount = 1;
    }

    // Update the previous data value
    previousData = data;
  } else {
    previousData = null; // Reset the previous data if it's not in the range
  }

  dbConnection.query(insertQuery, [data], (err, result) => {
    if (err) {
      console.error("Error updating data in the database:", err);
      res.status(500).send("Error processing data");
    } else {
      console.log("Data received and updated in the database");
      res.send("Data received and processed.");
    }
  });
});

app.listen(PORT, YOUR_IP_ADDRESS, async() => {
  console.log(`Server is running on ${YOUR_IP_ADDRESS}:${PORT}`);
  await initMail();
});
