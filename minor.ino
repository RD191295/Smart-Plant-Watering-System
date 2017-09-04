int a1;
int moisture;
int adc;
int sensorMin = 0;      
int sensorMax = 1023;
void setup() 
{
  Serial.begin(9600);
}

void loop() 
{
adc = analogRead (A0);
moisture=100-adc/10.23 ;
Serial.println(adc);
Serial.println(moisture);
}
