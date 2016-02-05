import subprocess
import RPi.GPIO as GPIO

# Initialize File name
filename = "temperatureData.txt"

# Open File for IO Writing -- ability to port to site
file = open(filename,'w')

GPIO.setmode(GPIO.BCM)
GPIO.setup(18, GPIO.OUT)

# Turn on the pin and see the LED light up.
GPIO.output(18, GPIO.HIGH)
#Turn off the pin to turn off the LED.
#GPIO.output(18, GPIO.LOW)

subprocess.call("sudo service motion start", shell=True)

print "Camera enabled"

subprocess.call("sudo modprobe w1-gpio", shell=True)
subprocess.call("sudo modprobe w1-therm", shell=True)
subprocess.call("cd /sys/bus/w1/devices/", shell=True)

print "Start Temperature readings"

while True:
	textfile = open("/sys/bus/w1/devices/28-000006533c7c/w1_slave")


	text_data = textfile.read()
	textfile.close()
	
	# Split the text with new lines (\n) and select the second line. 
	secondline = text_data.split("\n")[1]
	
	# Split the line into words, referring to the spaces, 
	# and select the 10th word (counting from 0). 
	temperaturedata = secondline.split(" ")[9] 

	# The first two characters are "t=", so get rid of 
	# those and convert the temperature from a string to a number. 
	temperature = float(temperaturedata[2:])
	final_reading = temperature / 1000
	print final_reading

	# Write Temperature Data to File - in Celsius
	file.write("Temperature: " + str(final_reading) + " Celsius" + "\n")
