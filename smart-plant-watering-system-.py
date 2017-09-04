while 1:
import serial
import time
import MySQLdb
import glob
import RPi.GPIO as GPIO
import plotly.plotly as py
import plotly.graph_objs as go
import plotly
plotly.tools.set_credentials_file(username='rd_123',api_key='ict1h8qxd1')
from time import strftime
date=time.strftime("%d/%m/%y")
time=time.strftime("%H:%M:%S")
print date
print time
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.setup(23,GPIO.OUT)
GPIO.setup(24,GPIO.OUT)
device='/dev/ttyACM0'
db=MySQLdb.connect(host="localhost", user="root", passwd="raj", db="sensor") or die("could not connect to database")
cur= db.cursor()
try:
print"percentage of moisture data is:"
arduino=serial.Serial(device,9600)
except:
print"failed to connect on",device
try:
data=arduino.readline()
print data
if (data<55):
GPIO.output(23, 1)
GPIO.output(24, 0)
sleep(20)
GPIO.output(23, 0)
GPIO.output(24, 0)
print"plant watering is finished"
else:
print"soil moisture content is ok"
try:
cur.execute("INSERT INTO moisture (date) VALUES (%s)",date)
cur.execute("INSERT INTO moisture (time) VALUES (%s)",time)
cur.execute("INSERT INTO moisture (percentage) VALUES (%s)",data)
db.commit()
cur.close()
except MySQLdb.IntegrityError:
print"failed to insert data"
finally:
cur.close()
except:
print"failed to get data from arduino"
print data
x = [date,time]
data1 = [go.Scatter(x=x,y=data)]
py.iplot (data1)