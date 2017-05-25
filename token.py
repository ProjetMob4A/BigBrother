#!/usr/bin/env python
# -*- coding: utf-8 -*-

# Script client

import socket
from os import popen
from hashlib import sha256

hash_pass = sha256('AragonZweisamkeit').hexdigest() # Stocker en dur et checker l'intégrité côté serveur ?

salt = "Aragon"

password_in = raw_input("Entrez le mot de passe de votre token : ")

hash_in = sha256(salt + password_in).hexdigest()

if hash_in != hash_pass:

	print "Erreur : mot de passe incorrect"
	exit()

else:

	host="192.168.1.49"
	port=10000

	socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
	socket.connect((host, port))
	print "Connection on {}".format(port)

	identifiant = socket.recv(255)
	print "Your id is {}".format(identifiant)

	# Quand on aura le .jar :

	# cmd = "java -jar token.jar " + identifiant

	# out = popen(cmd)

	# secret = out.read()

	secret = "35:77:6b:12:a7:a9\n"
	socket.sendall(secret)
	print "Secret sent"

	print "Close"
	socket.close()
