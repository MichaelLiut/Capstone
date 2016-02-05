import sys
import RPi.GPIO as GPIO
import signal
import time


GPIO.setmode(GPIO.BCM)
GPIO.setup(17, GPIO.IN)
#setup signal handler to catch ctrl+c detection and exit cleanly
def signal_handler(signal, frame):
    print("Ctrl+C detected...")
    GPIO.cleanup()
    sys.exit(0)
signal.signal(signal.SIGINT, signal_handler)

while 1:
    print(GPIO.input(17))
    time.sleep(0.2)
    If (GPIO.input(17) == 0)
        print ('change')
