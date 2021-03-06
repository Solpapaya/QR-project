import cgi, os
import cv2
import os
import sys
import cgitb; cgitb.enable()
import re
import pytesseract
pytesseract.pytesseract.tesseract_cmd = r'C:\\Program Files\\Tesseract-OCR\\tesseract.exe'
# from pdf2image import convert_from_bytes, convert_from_path
from pdf2image import convert_from_path
from pathlib import Path
from pyzbar import pyzbar
from PIL import Image

def read_barcodes(img):
   barcodes = pyzbar.decode(img)
   for barcode in barcodes:
      barcode_info = barcode.data.decode('utf-8')
      print(barcode_info)

def read_date(img):
   # Size of the image in pixels (size of orginal image) 
   width, height = img.size 
   # Setting the points for cropped image 
   left = width / 3
   top = 0
   right = width
   bottom = height / 4
   # Cropped image of above dimension 
   # (It will not change orginal image) 
   croppedImg = images[0].crop((left, top, right, bottom)) 
   # Takes Text within the image
   text = pytesseract.image_to_string(croppedImg)
   # Sets Regular Expression for Searching Date
   pattern = re.compile("\d{4}-\d{2}-\d{2}")
   # Searchs pattern in text
   match = pattern.search(text)
   date = match.group()
   print(date)

# Path to poppler
popplerPath = Path("C:/xampp/htdocs/SocialService/QR-project/py/poppler-21.02.0/Library/bin/")
# pdfPath = Path("C:/xampp/htdocs/SocialService/QR-project/" + sys.argv[1])
pdfPath = Path(sys.argv[1])


# Store Pdf with convert_from_path function
try:
   images = convert_from_path(pdf_path = pdfPath, poppler_path = popplerPath)
   read_barcodes(images[0])
   read_date(images[0])
except:
   print("Python Script Error")