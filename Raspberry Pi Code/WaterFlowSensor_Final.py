import sys
import RPi.GPIO as GPIO
import signal
import time

global tick
global starttime
global speed
global speed1
global counter
global constantOfWater

starttime = time.time()
pulseFreq = 7.5 #sensor frequency in Hz
counter = 0


# Initialize File name
filename = "waterFlowData.txt"

# Open File for IO Writing -- ability to port to site
file = open(filename,'w')


def my_callback(channel):
	print ("falling edge")
	global counter 
	counter += 1
	print ("counter: ", counter)
	global starttime
	print(time.time() - starttime, "seconds")


GPIO.setmode(GPIO.BCM)
GPIO.setup(17, GPIO.IN)

# Setup signal handler to catch ctrl+c detection and exit cleanly
GPIO.setup(17, GPIO.IN, pull_up_down=GPIO.PUD_UP) 

GPIO.add_event_detect(17, GPIO.FALLING, callback=my_callback, bouncetime=100)  

def signal_handler(signal, frame):
    print("Ctrl+C detected...")
    GPIO.cleanup()
    sys.exit(0)

#set signal handlder
signal.signal(signal.SIGINT, signal_handler)


while 1:

	time.sleep(0.05)

	#print(GPIO.input(17))

	if ((time.time()-starttime) > 5.00):
		speed = (counter/(10*pulseFreq))
		speedOne = (speed*60)	
		print ""
		print("speed: ", speed, "L/Sec")
		print "or"
		print("speed: ", speedOne, "L/Min")

		# Write Speed Data to File - in Litres per Minute -- seperated by line
		file.write("Speed: " + str(speedOne) + " L/Min" + "\n")
		
		print ""
		starttime = time.time()
		counter = 0
