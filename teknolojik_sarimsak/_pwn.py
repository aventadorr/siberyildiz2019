#!/usr/bin/python
from pwn import *
context.log_level = 'CRITICAL'

ss = int(sys.argv[-1])
for n, i in enumerate(open('crc3').readlines()):
    if n < ss:
        continue
    i = i.strip()


    while True:
        try:
            r = remote('10.0.2.15', 3572, timeout=5)
            r.writeline(i)

            rr = r.readall(timeout=1)
            print n, b64e(i), rr
            break
        except Exception as e:
            print e
            pass
