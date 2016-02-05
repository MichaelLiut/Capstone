import subprocess
from time import sleep

def lightsOff():
	#off
	subprocess.call("pigs p 17 0", shell=True)
	subprocess.call("pigs p 22 0", shell=True)
	subprocess.call("pigs p 24 0", shell=True)

lightsOff();
