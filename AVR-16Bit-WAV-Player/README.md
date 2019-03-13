<strong>INTRODUCTION</strong>

This project aims to implement a cost-effective wave player based on AVR (ATmega / ATiny Series) with CD-Audio Quality, which can play 8-bit/16-bit Mono/Stereo standard RIFF (Resource Interchange File Format) wave files.  This project can be applied into many applications such as bus / subway auto-annoucing system, elevator voice indication system.

<strong>Why WAV over MP3</strong>

->A WAV file format is simpler than MP3 and Easy to decode.

->WAV file is loseless .Thus there is no deteriotaion in audio quality.

<strong>USES</strong>

->Compare to OTP chip which is One Time Programmable 1GB, SD card can store over 200 songs

->SD card can be formated and rewrote again and again..

<strong>COMPONENTS</strong>

->ATMega-1284p - It is low power CMOS 8bit based on AVR architecture.

->Push Buttons: 2

-> Capacitors: 4.7nF(2), 22pF(2)

->Resistors: 1M ohm(2), 3.9k ohm(2), 3.3k ohm(3), 1.8k ohm(3), 4.7k ohm(1), 330 ohm

->USB-UART Module FT232RL - This is a USB to serial UART(TTL Level) converter module.

->AMS1117 3.3V -It regulates the input voltage down to a fixed 3.3V output

->SD card(1GB) 

<strong>PROTOCOLS</strong>

->SPI-The Serial peripheral interface(SPI) is a synchronous serial communication interface specification used for short-distance communication,primarily in embedded systems.

->FAT32 file system - Standard file system so that SD card can be operated normally in any PC with FAT support. With this method, it is very convenient to replace / update audio files, the difficulty is that a lightweight File System must be implemented so that MCU is able to retrieve data via standard FAT16/32.

<strong>SCHEMATIC</strong>
![alt text](https://github.com/SharmaRitik/Projects-Fest-2019/blob/master/AVR-16Bit-WAV-Player/Schematic.jpg)
