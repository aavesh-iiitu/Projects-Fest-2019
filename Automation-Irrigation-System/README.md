<h1>Automation Irrigation System</h1>

**Introduction:** In this project,with the help of arduino we have created an automatic plant watering system,which will waters plant without any human interference.

**Components Required:**

1.Arduino uno<br/>
2.TTL SIM 800 GSM Module<br/>
3.16*2 LCD<br/>
4.Relay 12V<br/>
5.Water cooler pump<br/>
6.Soil Moisture Sensor<br/>
7.PCB board<br/>
8.Soldering Kit<br/>
9.Variable Resistors(1K,10K,100K)<br/>
10.IC LM317,Transistor BC547(2)<br/>
11.Terminal connector,Connecting Wires<br/>

**Constructions:**
- Soil Moisture Sensor Probe is used to sense the soil moisture level.One side of the probe is directly connected to Vcc and other probe terminal goes to the base of BC547 transistor. A potentiometer is connected to the base of the transistor to adjust the sensitivity of the sensor.
- Arduino is used for controlling whole the process of this Automatic Plant Watering System. The output of soil sensor circuit is directly connected to digital pin D7 of Arduino. A LED is used at the sensor circuit, this LED’s ON state indicates the presence of moisture in the soil and OFF state indicates the absense of moisture in the soil.
- GSM module is used for sending SMS to the user. Here we have used TTL SIM800 GSM module, which gives and takes TTL logic directly .
- A LM317 Voltage regulator is used to power the SIM800 GSM module. LM317 is very sensitive to voltage rating and its operating voltage rating is 3.8v to 4.2v .
- An LCD is also used for displaying status and messages. Control pins of LCD, RS and EN are connected to pin 14 and 15 of Arduino and data pins of LCD D4-D7 are directly connected at pin 16, 17, 18 and 19 of Arduino.<br/>
- A 12V Relay is used to control the 220VAC small water pump. The relay is driven by a BC547 Transistor which is further connected to digital pin 11 of Arduino.
![alt text](https://github.com/apurv0303/Projects-Fest-2019/blob/master/Automation-Irrigation-System/img1.png)
**Working:**
If moisture is present in soil then there is conduction between the two probes of Soil Moisture sensor and due to this conduction, transistor Q2 remains in triggered/on state and Arduino Pin D7 remains Low. When Arduino reads LOW signal at D7, then it sends SMS to user about “Soil Moisture is Normal. Motor turned OFF” and water pump remains in Off state.</br>
Now if there is no Moisture in soil then Transistor Q2 becomes Off and Pin D7 becomes High. Then Arduino reads the Pin D7 and turns On the water motor and also sends message to user about “Low Soil Moisture detected. Motor turned ON”. Motor will automatically turn off when there is sufficient moisture in the soil.
