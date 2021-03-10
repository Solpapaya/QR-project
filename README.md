# QR Project

This is a project that receives a tax receipt in PDF format and decodes the QR code located within the PDF in order to check the RFC of the owner's tax receipt. When it has the RCF, it validates if the owner's tax receipt has already been uploaded. If it hasn't, the expedition date of the tax receipt and the owner's RFC is recorded in a Database in order to keep track of each owner's tax receipts.

## Project Steps

1. A PDF tax receipt is uploaded in the Web page.
2. Manager inputs the Expedition Month of the Tax Receipt.
3. Manager clicks "Validate!" button.
4. File is uploaded to the server. 
5. The server executes a Python Script that:
    
, then it converts the PDF to image in order to be able to scan de image and look for the QR code that its inside it.
