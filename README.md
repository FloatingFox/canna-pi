# Canna-Pi

Monitoring and Controlling your Growbox with a Raspberry Pi

Hardware requirements:

- Raspberry Pi
- DHT22 Temp/Humidity Sensor
- SainSmart 8-Channel Relaisboard 5V AC250V
- Steptransformer to control Fanspeed via voltage (will be connected to Relaisboard)

Features:
  - Temperature and Humidity logging into database.csv
  - Periodical export of database.csv to external SQL-Database
  - Display climate data in Graph on external Webserver (e.g. Synology NAS)
  - Display climate data in raw-format
  - Control Fanspeed

Todo:
  - Retrieve current Fanspeed from Raspberry Pi
  - Selection for both start and enddate of shown data
  - Automatic fanspeed adjustment based on temperature and humidity depending on given parameters as max. temp/hum
  - Settings for when the light goes on/off graph displays full days
  - Settings for growth- and bloomperiod to calculate and display the actual growth/bloomday 
  - Logbook where you can enter details as: nutrients, amount/time of watering, comments etc..
  - Settings.ini with global variables (e.g. default amount of days shown) from different sites
  - Create install.php routine 
