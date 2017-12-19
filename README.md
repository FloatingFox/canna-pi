# Canna-Pi

Monitoring and Controlling your Growbox with a Raspberry Pi

Hardware requirements:

- Raspberry Pi 
- DHT22 Temp/Humidity Sensor + Resistance between 4.7kOhm and 10kOhm
- SainSmart 8-Channel Relaisboard 5V AC250V
- Steptransformer to control Fanspeed via voltage (will be connected to Relaisboard)

Features:
  - Temperature and Humidity logging into database.csv
  - Periodical export of database.csv to SQL-Database (Shell-script using wiringPi / Adafruit on Raspberry)
  - Display climate data in Graph
  - Display climate data in raw-format (table)
  - Control and display Fanspeed

Installation:

  SCRIPTS TO GET TEMP/HUM AND WRITE TO DATABASE

  - Wire your DHT22 or other sensor and install wiringPi(lol_dht22) or Adafruit and make sure it is working. In my case, only wiringPi is working, but for others it might be the other way around. There are scripts for both library's. You'll find plenty of tutorials on how to wire and install those out there ;)
  - Download and extract pi-scripts_sql.zip
  - Import the SQL-Structure into your SQL-Server. 
  - temp.sh: Adjust the GPIO Pin (here it is wiringPin 7/GPIO Pin 4) used on line 6 of temp.sh and eventually the path on line 2
  - check.sh: replace <ip-address> with the ip-address of your SQL-Server. You can use your Raspberry or another SQL-Server on your             local network. This script makes sure the SQL-Server is pingable before starting writeDB.sh.
  - writeDB.sh: Replace <username>, <password>, <ip-address>, <port>, <database> and <table> with your own credentials/data.
  
  SCRIPTS FOR CONTROLLING FAN'S SPEED VIA RELAIS AND STEPTRANSFORMER
  
  You'll find pictures in the ZIP on how a wiring of a relais can look like. In that case it is wired so that the Fan's speed will automatically go up to maximum if the connection to the Raspberry Pi is lost for whatever reason. In that way you don't have to fear that the Fan is ever going off.
  
  - gpio.sh: This script needs to be executed at every boot of the raspberry to activate all GPIO Pins used for your Relais.It also sets a default speed, here, 150V. Adjust accordingly.
  - ltioff.sh, lti80.sh, lti100.sh etc: Controls the Fan and writes current speed to a file "ltistat.csv". Adjust Pins accordingly and the path if you need.
  
  APACHE, PHP AND MYSQL CLIENT ON RASPBERRY AND PHP-FILES
  
  To get informations about and to control the fanspeed, we are using a webserver like apache2 and php5 on the raspberry pi. To be able to write data into our database, we need the mysql-client. 
  
  - fanctrl.php: adjust the paths to your ltioff etc. scripts
  - fanstat.php: adjust path to your ltistat.csv
  - these files need to be in you apache rootdirectory, in this case, /var/www/html/
  - to get the fancontrol to work, the user www-data needs to be able to read/write into the directory where your ltistat.csv is located.
  
