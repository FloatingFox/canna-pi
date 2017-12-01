# Canna-Pi

Monitoring and Controlling your Growbox with a Raspberry Pi

Hardware requirements:

- Raspberry Pi
- DHT22 Temp/Humidity Sensor
- SainSmart 8-Channel Relaisboard 5V AC250V
- Steptransformer to control Fanspeed via voltage (will be connected to Relaisboard)

Features:
  - Temperature and Humidity logging into database.csv
  - Periodical export of database.csv to SQL-Database (Shell-script using wiringPi / Adafruit on Raspberry)
  - Display climate data in Graph
  - Display climate data in raw-format
  - Control Fanspeed

Todo:
  - Automatic fanspeed adjustment based on temperature and humidity depending on given parameters as max. temp/hum
  - Settings for when the light goes on/off graph displays full days
  - Settings for growth- and bloomperiod to calculate and display the actual growth/bloomday 
  - Logbook where you can enter details as: nutrients, amount/time of watering, comments etc..
  - Create install.php routine 
  - Camera timelapse over the day saved as .gif at the end of day, then transferred to server and associated with logbook
