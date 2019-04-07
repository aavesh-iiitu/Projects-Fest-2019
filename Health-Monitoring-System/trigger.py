#!/usr/bin/env python


import os
import RPi.GPIO as gpio
import time
import datetime
import glob
import MySQLdb
from time import strftime
import urllib
import serial



def probe_temp(tempfile):    #Returns tamperature value at the time of interrupt
  try:
    file = open(tempfile, 'r')
    lines = file.readlines()
    file.close()
  except:
    return None
  status = lines[0][-4:-1]

  if status == 'YES':
    tempstr = lines[1][-6:-1]
    tempval = float(tempstr)/1000
    return tempval
  else:
    print "Error in reading file, please try again"


def main():

  PIR_Input = 11 #PIR sensor connected to pin 11

  gpio.setmode(gpio.BOARD) #differential numbering of board pins, need to specify which convention being used
  gpio.setup(PIR_Input, gpio.IN)#specifying physical pin 11 as input
   
  os.system('sudo modprobe w1-gpio') #loads the kernel
  os.system('sudo modprobe w1-therm')
  status = lines[0][-4:-1]

  if status == 'YES':
    tempstr = lines[1][-6:-1]
    tempval = float(tempstr)/1000
    return tempval
  else:
    print "Error in reading file, please try again"


def main():

  PIR_Input = 11 #PIR sensor connected to pin 11

  gpio.setmode(gpio.BOARD) #differential numbering of board pins, need to specify which convention being used
  gpio.setup(PIR_Input, gpio.IN)#specifying physical pin 11 as input
  gpio.setup(13,gpio.OUT)
  os.system('sudo modprobe w1-gpio') #loads the kernel
  os.system('sudo modprobe w1-therm')
  devicename = glob.glob ('/sys/bus/w1/devices/28*') # useful only if only 1 temperature sensor is connected

  if devicename=='':
    print "Check DS18B20 connection, no device recognized"
  else:
    w1tempfile = devicename[0] + '/w1_slave'

  print "Process Initialized.\nWaiting for Interrupt..."
  try:
    while True:
      ser=serial.Serial('/dev/ttyACM0',9600)
      print("hello")
      
      time.sleep(4)
      current_state = gpio.input(PIR_Input) #Checks for input     
      if current_state==1 :
          gpio.output(13,True)
          time.sleep(0.5)
          gpio.output(13,True)
          time.sleep(0.5)
          gpio.output(13,False)



      print "Current se of input at pin 11 is", current_state
      temperature = probe_temp(w1tempfile)
      print "Waiting for Heart Beat reading..."
      time.sleep(2)
      read_serial=ser.readline()
      print read_serial
      url ='http://192.168.43.43/write-to-database.php?temp='+str(temperature)+'&pir11='+str(current_state)+'&heartrate='+str(read_serial)
      result = urllib.urlopen(url)
      time.sleep(1)
      print "\nRecorded Temperature is ", (temperature)
      time.sleep(1)
      print "\nWriting to Database..."
      time.sleep(1)
      print "\nProcess Finished.\n"
      print "\nProcess Initialized Again.\nWaiting for Interrupt..."
  except KeyboardInterrupt:
    pass

if __name__=="__main__":
  main()


