#include <EEPROM.h>

#include <LiquidCrystal.h>
#include "DHT.h"
//Arduino to NodeMCU Lib
#include <SoftwareSerial.h>
#include <ArduinoJson.h>

SoftwareSerial nodemcu(11, 12);


LiquidCrystal lcd(2, 3, 4, 5, 6,7);
const int relay_Pin = 8;
const int DHT11_Sesnor = 9;
const int moisture_sensor = A0;
const int rain_Sesnor = 10;



#define DHTTYPE DHT11
int motor=0;
int  moisture_sensor_value;
int rain_Sesnor_value;
float humudity_value,temprature_value;
DHT dht(DHT11_Sesnor, DHTTYPE);

void setup() {
  Serial.begin(9600);  
  lcd.begin(16, 2);
  lcd.print("Smart Irrigation ");
  lcd.setCursor(0,2);
  lcd.print(" SYSTEM");
  nodemcu.begin(9600);
  delay(1000);
  
  pinMode(relay_Pin, OUTPUT);
  pinMode(rain_Sesnor, INPUT);
  digitalWrite(relay_Pin, LOW); 
  dht.begin();
   delay(200);

}
void loop() 
{

  readDTH11_Sesnor();
  moisture_level_detected();
  water_motor_start();

  StaticJsonBuffer<1000> jsonBuffer;
  JsonObject& data = jsonBuffer.createObject();
  data["humidity"] = humudity_value;
  data["temperature"] = temprature_value; 
  data["motor"] = motor;
  data["rain"] = rain_Sesnor_value;
  data["moisture"] = moisture_sensor_value;

    //Send data to NodeMCU
  data.printTo(nodemcu);
  jsonBuffer.clear();

  delay(2000);

}


void readDTH11_Sesnor()
{

  // Reading temperature or humidity takes about 250 milliseconds!
  // Sensor readings may also be up to 2 seconds 'old' (its a very slow sensor)
//  humudity_value = dht.readHumidity();
    humudity_value = 70.00;
  // Read temperature as Celsius (the default)
  temprature_value = dht.readTemperature();

  // Check if any reads failed and exit early (to try again).
  if (isnan(humudity_value) || isnan(temprature_value)) {
    Serial.println(("Failed to read from DHT sensor!"));
    return;
  }

  Serial.print((" Humidity: "));
  Serial.print(humudity_value);
  Serial.print(("%"));
//   lcd.begin(16, 2);
  lcd.clear();
  lcd.print("Humidity %: ");
  lcd.setCursor(0,2);
  lcd.print(humudity_value);
  Serial.print("\n");
  delay(1000); 
  Serial.print(("Temperature: "));
  Serial.print(temprature_value);
  Serial.print(("C "));
  lcd.clear();
  lcd.print("Temperature degCel");
  lcd.setCursor(0,2);
  lcd.print(temprature_value);
  Serial.print("\n");
  delay(1000); 
}

void moisture_level_detected()
{

  moisture_sensor_value = analogRead(moisture_sensor); 
  Serial.println("Moisture Level : ");
  Serial.println(moisture_sensor_value);
//  lcd.begin(16, 2);
  lcd.clear();
  lcd.print("Moisture Level :");
  lcd.setCursor(0,2);
  lcd.print(moisture_sensor_value);
  delay(1000);
}

void water_motor_start()
{

 rain_Sesnor_value = digitalRead(rain_Sesnor); 
 Serial.print(rain_Sesnor_value);

 delay(1000);
 if(rain_Sesnor_value == true)
 {
    if(moisture_sensor_value > 700 )
    {
      digitalWrite(relay_Pin, LOW); 
      motor=1;
//      lcd.begin(16, 2);
      lcd.clear();
      lcd.print("Low water level");
      lcd.setCursor(0,2);
      lcd.print("Motor ON");
      delay(1000);
    }
    else
    {
      digitalWrite(relay_Pin, HIGH); 
      motor=0;
//      lcd.begin(16, 2);
      lcd.clear();
      lcd.print("Water Level Ok");
      lcd.setCursor(0,2);
      lcd.print("Motor OFF");
      delay(1000);
    }
 }
 else
 {
      digitalWrite(relay_Pin, HIGH); 
      motor=0;
      
      lcd.clear();
      lcd.print("Rain Detected");
      lcd.setCursor(0,2);
      lcd.print("Motor OFF");
  delay(1000);
 }
}
