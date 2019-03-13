<h1>IOT BASED HEALTH MONITORING SYSTEM FOR COMATOSE PATIENTS</h1>

**INTRODUCTION:**

As we know coma is a state of unconsciousness in which patient cannot feel or respond to the pain, light or sound, it does not initiate volunteering any actions. Patients in a coma state need to have a continuous update of  temperature humidity.Doing this manually can become almost impossible to keep updates of multiple patients at the same time. In order to address this situation, our system comes to the rescue; this system will collect the information of patients with the help of sensors. These sensors use WiFi to communicate this information to the internet. This system is powered by the Raspberry Pi, it includes temperature sensor, PIR sensor, heart rate meter and LCD display.</br>
When we turn the system on, it gets connected to the website using WiFi, System monitor shows four signs namely heart rate, temperature, humidity. While testing heart rate function of the system, the heart rate value get updated over IOT and LCD display.
In case if the patient regains consciousness and attempts to move, the sensor will detect the motion and update it over IOT and LCD. In this way, our system monitors the comatose patients.</br>

**Components required:**

⦁	Rasberry pi 3 model B+ with WiFi module</br>
⦁	Temperature Humidity, Heart rate meter, PIR Sensor </br>
⦁	LCD Display  </br> 
⦁	Mcp3208 ADC</br> 

 **Software Requirements :**
 
⦁	Python </br>
⦁	OS: Raspbian</br>

**Construction and working:**

The construction and working of our IoT based health system can be well defined by the following block diagrams and images:</br>
![alt text](https://github.com/AaryanG/Projects-Fest-2019/blob/master/Health-Monitoring-System/healthmonitoring%20image%201.png)</br>
![alt text](https://github.com/AaryanG/Projects-Fest-2019/blob/master/Health-Monitoring-System/health%20monitoring%20image%202.jpg)</br>
**Future scope:**

As a conclusion, a prototype of patient monitoring system using wireless sensor network has been successfully developed.
Based on the results obtained from the project, it showed that the project achieved the first objective.The system is able to process the information and display real time data on the internet. The sensor data can be monitored through laptop or personal computer wirelessly.In order to commercialize the device to the public usage, some improvements need to be considered. Therefore, for the future works, more vitals parameters should be added to make it more valuable to the patients. For example, pulse oximeter and blood pressure are added to monitor oxygen concentration and blood pressure of patients.Another improvement that can be made in this project is replacing the used sensors with some good quality sensors. This might help to make it more functional to the users.


