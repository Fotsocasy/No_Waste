#include <HTTPClient.h>
#include <WiFi.h>

int trigPin = 5;    // Trigger
int echoPin = 4;    // Echo
long duration, cm, inches;

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

  digitalWrite(trigPin, LOW);
  delayMicroseconds(5);
  digitalWrite(trigPin, HIGH);
  delayMicroseconds(10);
  digitalWrite(trigPin, LOW);

  pinMode(echoPin, INPUT);
  duration = pulseIn(echoPin, HIGH);

  cm = (duration / 2) / 29.1;  // Calculate distance in cm

  // Ensure that the calculated distance is within the specified range
  cm = constrain(cm, 2, 17);

  // Invert the mapping to get the percentage
  int percentage = map(cm, 17, 2, 0, 100);

  String urlss = url + "/live-data/" + percentage;
  http.begin(urlss);
  int httpResponseCode = http.GET();
  String payload = http.getString();

  Serial.print("httpResponseCode: ");
  Serial.println(httpResponseCode);
  Serial.print("Percentage Full: ");
  Serial.print(percentage);
  Serial.println("%");

  delay(2000);
}
