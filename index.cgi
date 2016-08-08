#!/usr/bin/python 

import os;
import cgitb;
import cgi;
import sys;

cgitb.enable()

IMG_DIR = "img"

print("Content-type: text/html\r\n\r\n")
print("<html>")
print("\t<head>")
print("\t\t<title>Images demo</title>")
print("\t\t<meta charset='utf-8'>")
print("\t\t<style>")
print("\t\t\ttable,thead,th,td { ")
print("\t\t\t\tborder: 1px solid #888888;")
print("\t\t\t\tborder-collapse: collapse;")
print("\t\t\t}")
print("\t\t\ttd { ")
print("\t\t\t\tpadding: 10px;")
print("\t\t\t}")
print("\t\t</style>")
print("\t</head>")
print("\t<body>")
print("\t\t<table>")
print("\t\t\t<thead><td>filename</td><td>image</td></thead>")
os.chdir(IMG_DIR)
for filename in os.listdir("."):
	if "jpg" in filename.lower() or "png" in filename.lower() or "gif" in filename.lower():
		print('\t\t\t<tr><td>{0}</td><td><img style="width:400px" src="{1}/{2}"></td></tr>'.format(filename, IMG_DIR,filename))
print("\t\t</table>")
print("\t<a href='upload_portal.html'>Upload more</a>")
print("\t</body>")
print("</html>")

