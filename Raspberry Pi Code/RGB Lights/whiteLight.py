import subprocess
from time import sleep

def whiteColour():
	#white
	subprocess.call("pigs p 17 255", shell=True)
	subprocess.call("pigs p 22 255", shell=True)
	subprocess.call("pigs p 24 255", shell=True)

whiteColour();
