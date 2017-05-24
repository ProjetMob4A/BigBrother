#!/usr/bin/env python

# Script client

import socket
from time import sleep
import subprocess

host="192.168.1.49"
port=10000

socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
socket.connect((host, port))
print "Connection on {}".format(port)

identifiant = socket.recv(255)
print "Your id is {}".format(identifiant)

# Quand on aura le .jar :

# cmd = "java -jar token.jar " + identifiant

# out = os.popen(cmd)

# secret = out.read()

secret = "35:77:6b:12:a7:a9\n"
socket.sendall(secret)
print "Secret sent"

print "Close"
socket.close()
