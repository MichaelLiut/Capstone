import subprocess
from time import sleep


def greenColour():
	#green
	subprocess.call("pigs p 17 0", shell=True)
	subprocess.call("pigs p 22 255", shell=True)
	subprocess.call("pigs p 24 0", shell=True)

greenColour();
