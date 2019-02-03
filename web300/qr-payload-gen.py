import qrcode
import sys


payload = sys.argv[1]
print("Payload: {}".format(payload))
img = qrcode.make(payload)
img.save("qr.jpg")
