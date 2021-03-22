<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Project</title>
    <script src="https://kit.fontawesome.com/5c9c41b555.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;400;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="build/css/app.css">
</head>
<body>
    <header class="header">
        <nav class="nav">
            <a class="logo" href="index.php"><i class="fas fa-qrcode"></i></a>
        </nav>
    </header>
    <main>
        <section class="upload-section container">
            <h2>Sube tu Comprobante Fiscal</h2>
            <form class="form" action="uploadedFile.php" method="post" enctype="multipart/form-data">
            <!-- <form class="form" method="post" enctype="multipart/form-data"> -->
                <!-- Show table in the same page -->
                <div class="field">
                    <p>Selecciona el Mes al que corresponde el Comprobante Fiscal</p>
                    <div class="select-input">Enero</div>
                    <div class="month-container">
                        <input type="radio" name="month" id="Enero" value="Enero" checked> <label for="Enero">Ene</label>
                        <input type="radio" name="month" id="Febrero" value="Febrero"> <label for="Febrero">Feb</label>
                        <input type="radio" name="month" id="Marzo" value="Marzo"> <label for="Marzo">Mar</label>
                        <input type="radio" name="month" id="Abril" value="Abril"> <label for="Abril">Abr</label>
                        <input type="radio" name="month" id="Mayo" value="Mayo"> <label for="Mayo">May</label>
                        <input type="radio" name="month" id="Junio" value="Junio"> <label for="Junio">Jun</label>
                        <input type="radio" name="month" id="Julio" value="Julio"> <label for="Julio">Jul</label>
                        <input type="radio" name="month" id="Agosto" value="Agosto"> <label for="Agosto">Ago</label>
                        <input type="radio" name="month" id="Septiembre" value="Septiembre"> <label for="Septiembre">Sep</label>
                        <input type="radio" name="month" id="Octubre" value="Octubre"> <label for="Octubre">Oct</label>
                        <input type="radio" name="month" id="Noviembre" value="Noviembre"> <label for="Noviembre">Nov</label>
                        <input type="radio" name="month" id="Diciembre" value="Diciembre"> <label for="Diciembre">Dic</label>
                    </div>
                </div>
                
                <div class="field">
                    <div class="upload-input-container">
                        <p>Selecciona el PDF del Comprobante Fiscal</p>
                        <div class="flex-upload-container">
                            <label for="fileToUpload">Subir Archivo</label>
                        </div>
                        <!-- <input type="file" name="fileToUpload" accept=".pdf" id="fileToUpload" onchange="this.form.submit()"> -->
                    </div>
                </div>
                <!-- <input type="submit" value="Upload Image" name="submit"> -->
            </form>
            <!-- <div class="lds-dual-ring"></div> -->
            <!-- <div class="lds-ring"><div></div><div></div><div></div><div></div></div> -->
        </section>
    </main>

    <script src="build/js/bundle.min.js"></script>
</body>
</html>