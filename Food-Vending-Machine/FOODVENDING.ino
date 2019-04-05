#include <LiquidCrystal_I2C.h>   // including lcd attached to I2C libary
#include <Keypad.h>              // including Libaray for the electronic Keypad
   // #include <Servo.h>
#include <Stepper.h>             // including Stepper motor libaray

LiquidCrystal_I2C lcd(0x27, 16, 2);
#define coinDetector 10

  // Servo servo1;
const int stepPin=12;      // steper pin defination
const int dirPin=11;       // direction of stepper motor 
const byte ROWS = 4;            
const byte COLS = 4;
char keys[ROWS][COLS] = {       // defining 4*4 matrix for keypad 
  {'1','2','3','A'},
  {'4','5','6','B'},
  {'7','8','9','C'},
  {'*','0','#','D'},
};
byte rowPins[ROWS] = {5,4,3,2};     // defining pins on arduino for keypad
byte colPins[COLS] = {9,8,7,6};
Keypad keypad = Keypad( makeKeymap(keys), rowPins, colPins, ROWS, COLS );
int c;
    void setup() 
    {
      Serial.begin(9600);
      lcd.begin(); // Initializes the interface to the LCD screen, and specifies the dimensions (width and height) of the display
      lcd.backlight();
      pinMode(stepPin,OUTPUT);
      pinMode(stepPin,OUTPUT);
      pinMode(coinDetector, INPUT);
      // Activating the digital pins pull up resistors
     //  pinMode(button1, INPUT_PULLUP);
     //  pinMode(button2, INPUT_PULLUP);
      // pinMode(button3, INPUT_PULLUP);
      // pinMode(button4, INPUT_PULLUP);
      }
    void loop()
    {
      
      // Print "Insert a coin!" on the LCD
      
      lcd.clear();
      lcd.setCursor(0,0);
      lcd.print("Insert a coin !");  // lcd display function to show output
      // Wait until a coin is detected
      delay(2000);
      while (true) {
        if (digitalRead(coinDetector) == LOW) { // If a coin is detected , exit from the while loop
          break;
        }
      }
      delay(1000);  
      lcd.clear();
      lcd.setCursor(0 , 0);
      lcd.print("Select your item");   
      delay(1000);
      lcd.setCursor(0, 1);
      lcd.print(" A, B, C or D....");
     
      delay(2000);
      // Wait until a button is pressed
            
      while (true) 
      {                                        // conditions for geting the item by pressing keypad 
        char A,key=keypad.getKey();
        if (key == '*') {
        c = 1;                     
          Serial.println(key);               // output one is at "*" key of the kepypad
          break;
        }
        if (key == '7') {
          c= 2;                   
          Serial.println(key);            // output two is at "7" key of the kepypad
          break;
        }
        if (key == '4') {
          lcd.clear();
          lcd.setCursor(0,0);
          lcd.print("out of stock");   // output three is at "4" key of the kepypad where we say out of stock
          delay(1000);
          Serial.println(key);
          break;
        }
        if (key == '1') {
          lcd.clear();
          lcd.setCursor(0,0);
          lcd.print("out of stock");   // output one is at "1" key of the kepypad where we say out of stock
          delay(1000);
          Serial.println(key);
          break;
        }
        if(key != '*' && key != '4' && key != '1' && key != '7')
        {
          lcd.clear();
          lcd.setCursor(0,0);
          lcd.print("invalid input");   // if input on keypad is anything else except the above four, we say invalid input
          delay(1000);
        }
        }
      switch(c){
        case 1 :
        delay(1000);                         // case for ejecting the item when "*" IS PRESSED
          digitalWrite(dirPin,HIGH);
          delay(1000);
          for(int x=0;x<200;x++)
          {
            digitalWrite(stepPin,HIGH);    
            delayMicroseconds(500);
            digitalWrite(stepPin,LOW);          
            delayMicroseconds(500);
          }
           // Print "Delivering..." 
      delay(1000);
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("Delivering...");
      delay(5000);
      
          case 2 :
        delay(1000);
          digitalWrite(dirPin,HIGH);                // case for ejecting the item when "7" IS PRESSED
          delay(1000);
          for(int x=0;x<200;x++)
          {
            digitalWrite(stepPin,HIGH);
            delayMicroseconds(500);
            digitalWrite(stepPin,LOW);
            delayMicroseconds(500);
          }
           // Print "Delivering..." 
      delay(1000);
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("Delivering...");
      delay(5000);
      }
      // Print "Thank You..."        // output on lcd when the item is ejected
      lcd.clear();
      lcd.setCursor(0, 0);
      lcd.print("Thank You");
      delay(5000);
    }
