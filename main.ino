#include <Hash.h>
#include <ESP8266WebServer.h>
#include <ESP8266WebServerSecure.h>
#include <ESP8266WebServerSecureAxTLS.h>
#include <ESP8266WebServerSecureBearSSL.h>

#include <ESP8266HTTPClient.h>
#include <EEPROM.h>
#include <HX711_ADC.h>
#include <ESP8266WiFi.h>
const int LOADCELL_DOUT_PIN=2;
const int LOADCELL_SCK_PIN=3;
const int eepromAddress = 0;

long t;

const char *ssid="Lenovo";
const char *password="skdhwkamh15@90";
HX711_ADC LoadCell(2,3);
float calibration_factor=-96650;
void setup() {
  // put your setup code here, to run once:
  Serial.begin(115200);
  WiFi.begin(ssid,password);

  Serial.print("Connecting....");
  while(WiFi.status()!=WL_CONNECTED)
  {
    delay(500);
    Serial.print("Waiting to connect to WiFi\n");
  }
  Serial.println("WiFi connected");
  Serial.println("IP Address: ");
  Serial.println(WiFi.localIP());
  float calValue; // calibration value
  calValue = 40.0; // uncomment this if you want to set this value in the sketch 
  #if defined(ESP8266) 
  EEPROM.begin(115200);
  #endif
  EEPROM.get(eepromAddress, calValue);
  LoadCell.begin();
  long stabilisingtime = 2000; // tare preciscion can be improved by adding a few seconds of stabilising time
  LoadCell.start(stabilisingtime);
  /*if(LoadCell.getTareTimeoutFlag()) 
  {
    Serial.println("Tare timeout, check MCU>HX711 wiring and pin designations");
  }
  else 
  {*/
    LoadCell.setCalFactor(calValue); // set calibration value (float)
    //Serial.println("Startup + tare is complete");
  //}

  float weight=LoadCell.getData();
  Serial.print("Print in ");
  Serial.print(Serial.read());
  Serial.println(weight);
}

void loop() {
  // put your main code here, to run repeatedly:
  LoadCell.update();
  HTTPClient http;    //Declare object of class HTTPClient
  
  //Serial.print("Check 1 ");
  if (millis() > t + 25000) 
  {
    float i = LoadCell.getData();
    Serial.print("Load_cell output val: ");
    Serial.println(i);
    t = millis();
    //CreateHashMap(postData ,String, int,2);
  String product_id="PAN1",postData,weight=String(i);
  //Post Data
  //postData ="?product_id="+product_id + "&weight=" + i;
  String url="http://192.168.43.117/smart_pantry/insert.php?product_id=PAN1&weight="+weight;
  http.begin(url);              //Specify request destination
  http.addHeader("Content-Type", "application/x-www-form-urlencoded");    //Specify content-type header
  int httpCode = http.POST("");   //Send the request
  //Serial.print("postData=");
  //Serial.println(postData);
  Serial.println(httpCode);
  }
  if (Serial.available() > 0) 
  {
    //Serial.print("Check 2 ");
    float i;
    char inByte = Serial.read();
    if (inByte == 't') LoadCell.tareNoDelay();
  }

  //check if last tare operation is complete
  if (LoadCell.getTareStatus() == true) 
  {
    //Serial.print("Check 3 ");
    Serial.println("Tare complete");
  }

  
}
