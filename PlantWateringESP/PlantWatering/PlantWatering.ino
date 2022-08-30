//ThatsEngineering
//Sending Data from Arduino to NodeMCU Via Serial Communication
//NodeMCU code

//Include Lib for Arduino to Nodemcu
#include <SoftwareSerial.h>
#include <ArduinoJson.h>
#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ESP8266WebServer.h>
#include <ESP8266HTTPClient.h>

WiFiClient client;

int Led_OnBoard = 2;                  // Initialize the Led_OnBoard


const char* ssid = "THE WALL";                  // Your wifi Name
const char* password = "12345678";          // Your wifi Password

const char *host = "192.168.137.1"; //Your pc or server (database) IP, example : 192.168.0.0 , if you are a windows os user, open cmd, then type ipconfig then look at IPv4 Address.


//D6 = Rx & D5 = Tx
SoftwareSerial nodemcu(D6, D5);


void setup() {
  pinMode(Led_OnBoard, OUTPUT);       // Initialize the Led_OnBoard pin as an output
  WiFi.mode(WIFI_OFF);        //Prevents reconnection issue (taking too long to connect)
  delay(1000);
  WiFi.mode(WIFI_STA);        //This line hides the viewing of ESP as wifi hotspot
  WiFi.begin(ssid, password);     //Connect to your WiFi router
  Serial.println("");

  Serial.print("Connecting");
  // Wait for connection
  while (WiFi.status() != WL_CONNECTED) {
    digitalWrite(Led_OnBoard, LOW);
    delay(250);
    Serial.print(".");
    digitalWrite(Led_OnBoard, HIGH);
    delay(250);
  }

  digitalWrite(Led_OnBoard, HIGH);
  //If connection successful show IP address in serial monitor
  Serial.println("");
  Serial.println("Connected to Network/SSID");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());  //IP address assigned to your ESP

  // Initialize Serial port
  Serial.begin(9600);
  nodemcu.begin(9600);
  while (!Serial) continue;
}

void loop() {

  HTTPClient http;    //Declare object of class HTTPClient

  String moisture_sensor,humudity,rain_Sesnor,temperature,motor, postData;

  StaticJsonBuffer<1000> jsonBuffer;
  JsonObject& data = jsonBuffer.parseObject(nodemcu);

  if (data == JsonObject::invalid()) {
    //Serial.println("Invalid Json Object");
    jsonBuffer.clear();
    return;
  }

  Serial.println("JSON Object Recieved");
  float moisture_sensor_value = data["moisture"];
  Serial.println(moisture_sensor_value);
  float humudity_value = data["humidity"];
  Serial.println(humudity_value);
  int rain_Sesnor_value = data["rain"];
  Serial.println(rain_Sesnor_value);
  float temperature_value = data["temperature"];
  Serial.println(temperature_value);
  int motor_value = data["motor"];
  Serial.println(motor_value);

  Serial.println("-----------------------------------------");

  moisture_sensor = String(moisture_sensor_value);   //String to interger conversion
  humudity = String(humudity_value);   //String to interger conversion
  rain_Sesnor = String(rain_Sesnor_value);   //String to interger conversion
  temperature = String(temperature_value);   //String to interger conversion
  motor = String(motor_value);   //String to interger conversion
  postData = "moisture=" + moisture_sensor + "&humidity=" + humudity + "&rain=" + rain_Sesnor+ "&temp=" + temperature+"&motor=" + motor;

  http.begin(client, "http://192.168.137.1/Fatin/InsertDB.php");
  //  http.begin("http://192.168.137.1/Nodemcu_db_record_view/InsertDB.php");              //Specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header

  int httpCode = http.POST(postData);   //Send the request
  String payload = http.getString();    //Get the response payload

  //Serial.println("LDR Value=" + ldrvalue);
  Serial.println(httpCode);   //Print HTTP return code
  Serial.println(payload);    //Print request response payload
//  Serial.println("ID Value=" + IDSend);
//  Serial.println("Product Value=" + ProductSend);
//  Serial.println("Value Value=" + ValueSend);

  http.end();  //Close connection

  delay(4000);  //Here there is 4 seconds delay plus 1 second delay below, so Post Data at every 5 seconds
  digitalWrite(Led_OnBoard, LOW);
  delay(1000);
  digitalWrite(Led_OnBoard, HIGH);


}
