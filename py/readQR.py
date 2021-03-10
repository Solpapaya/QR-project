import cgi, os
import cv2
import os
import sys
import cgitb; cgitb.enable()
# from pdf2image import convert_from_bytes, convert_from_path
from pdf2image import convert_from_path
from pathlib import Path
from pyzbar import pyzbar
from PIL import Image

def read_barcodes(img, pdfPath):
   barcodes = pyzbar.decode(img)
   for barcode in barcodes:
      barcode_info = barcode.data.decode('utf-8')
      print(barcode_info)
   deleteFile(pdfPath)

def deleteFile(pdf):
   os.remove(pdf)

# Path to poppler
popplerPath = Path("../py/poppler-21.02.0/Library/bin/")
pdfPath = sys.argv[1]


# Store Pdf with convert_from_path function
images = convert_from_path(pdf_path = pdfPath, poppler_path = popplerPath)
read_barcodes(images[0], pdfPath)