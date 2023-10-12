#include <HTTPClient.h>
#include <WiFi.h>

const int trigPin = 5;    // Trigger
const int echoPin = 4;    // Echo
const int numReadings = 5;  // Number of readings to average
const float minDistance = 2.0;  // Minimum distance (cm)
const float maxDistance = 17.0; // Maximum distance (cm)

long duration;
float cm, inches;
float readings[numReadings];  // Array to store readings
int currentIndex = 0;  // Index for storing the current reading
float total = 0; // Running total of readings

void setup() {
  WiFi.begin("CasyRose", "casyrose123456");
  while (WiFi.status() != WL_CONNECTED) {
    Serial.println("Connecting to WiFi...");
    delay(1000);
  }
  Serial.println("Connected to WiFi");
  Serial.println(WiFi.localIP());
  Serial.begin(9600);

  pinMode(trigPin, OUTPUT);
  pinMode(echoPin, INPUT);
}

void loop() {
  String url = "http://172.20.10.3:5000";
  HTTPClient http;

  // Trigger the ultrasonic sensor
  digitalWrite(trigPin, LOW);
  delayMicroseconds(5);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);

  // Read the pulse duration
  pinMode(echoPin, INPUT);
  duration = pulseIn(echoPin, HIGH);

  // Calculate the distance in centimeters
  cm = duration / 29.1;

  // Ensure the distance is within the specified range
  cm = constrain(cm, minDistance, maxDistance);

  // Store the reading in the array
  total = total - readings[currentIndex];
  readings[currentIndex] = cm;
  total = total + readings[currentIndex];
  currentIndex = (currentIndex + 1) % numReadings;

  // Calculate the running average
  float average = total / numReadings;

  // Invert the mapping to get the percentage
  int percentage = map(average, maxDistance, minDistance, 0, 100);

  String urlss = url + "/live-data/" + percentage;
  http.begin(urlss);
  int httpResponseCode = http.GET();
  String payload = http.getString();

  Serial.print("httpResponseCode: ");
  Serial.println(httpResponseCode);
  Serial.print("Average Percentage Full: ");
  Serial.print(percentage);
  Serial.println("%");

  delay(2000);
}