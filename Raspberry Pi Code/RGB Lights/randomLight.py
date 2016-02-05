import subprocess
from time import sleep

def redColour():
	#red 
	subprocess.call("pigs p 17 255", shell=True)
	subprocess.call("pigs p 22 0", shell=True)
	subprocess.call("pigs p 24 0", shell=True)

def blueColour():
	#blue
	subprocess.call("pigs p 17 0", shell=True)
	subprocess.call("pigs p 22 0", shell=True)
	subprocess.call("pigs p 24 255", shell=True)

def greenColour():
	#green
	subprocess.call("pigs p 17 0", shell=True)
	subprocess.call("pigs p 22 255", shell=True)
	subprocess.call("pigs p 24 0", shell=True)

def yellowColour():
	#yellow
	subprocess.call("pigs p 17 255", shell=True)
	subprocess.call("pigs p 22 128", shell=True)
	subprocess.call("pigs p 24 0", shell=True)

def purpleColour():
	#purple
	subprocess.call("pigs p 17 255", shell=True)
	subprocess.call("pigs p 22 128", shell=True)
	subprocess.call("pigs p 24 128", shell=True)

def whiteColour():
	#white
	subprocess.call("pigs p 17 255", shell=True)
	subprocess.call("pigs p 22 255", shell=True)
	subprocess.call("pigs p 24 255", shell=True)

def lightsOff():
	#off
	subprocess.call("pigs p 17 0", shell=True)
	subprocess.call("pigs p 22 0", shell=True)
	subprocess.call("pigs p 24 0", shell=True)


def switchColours():
	for i in range(100):
		redColour()
		sleep(0.5)

		blueColour()
		sleep(0.5)

		greenColour()
		sleep(0.5)

		yellowColour()
		sleep(0.5)

		purpleColour()
		sleep(0.5)

		whiteColour()
		sleep(0.5)

switchColours()
