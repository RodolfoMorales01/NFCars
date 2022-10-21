import time
import RPi.GPIO as gpio

gpio.setwarnings(False)
gpio.setmode(gpio.BOARD)
gpio.setup(22,gpio.OUT)

try:
   gpio.output(22,0)
   time.sleep(1)
   gpio.output(22,1)
   time.sleep(1)
except KeyboardInterrupt:
    gpio.cleanup()
    exit
