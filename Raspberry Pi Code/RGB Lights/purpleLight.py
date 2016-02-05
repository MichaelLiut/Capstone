import subprocess
from time import sleep

def purpleColour():
	#purple
	subprocess.call("pigs p 17 255", shell=True)
	subprocess.call("pigs p 22 128", shell=True)
	subprocess.call("pigs p 24 128", shell=True)

purpleColour();
