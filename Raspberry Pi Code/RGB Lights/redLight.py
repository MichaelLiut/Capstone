import subprocess
from time import sleep

def redColour():
	#red 
	subprocess.call("pigs p 17 255", shell=True)
	subprocess.call("pigs p 22 0", shell=True)
	subprocess.call("pigs p 24 0", shell=True)

redColour();
