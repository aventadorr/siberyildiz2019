#!/usr/bin/python
from itertools import *
from string import *
from pwn import *

FINALXOR = 0xffffffffL
INITXOR  = 0xffffffffL
CRCPOLY  = 0xEDB88320L
CRCINV   = 0x5B358FD3L

from binascii import crc32
from struct import pack

def tableAt(byte):
    return crc32(chr(byte ^ 0xff)) & 0xffffffff ^ FINALXOR ^ (INITXOR >> 8)

def compensate(buf, wanted):
    wanted ^= FINALXOR

    newBits = 0
    for i in range(32):
        if newBits & 1:
           newBits >>= 1
           newBits ^= CRCPOLY
        else:
           newBits >>= 1

        if wanted & 1:
           newBits ^= CRCINV

        wanted >>= 1

    newBits ^= crc32(buf) ^ FINALXOR
    return pack('<L', newBits)

t = 0xEE1E51C3
al = printable
al = ''.join(map(chr, range(1,256)))
for i in product(al, repeat=2):
    ii = ''.join(i)
    try:
        x = ii + compensate(ii, t)
        #print hex(2**32 + crc32(x))
        print b64e(x), `x`
    except:
        pass

