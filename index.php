<!-- Change dashboard appearance -->
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
<body class="not-uploaded">
    <header class="header">
        <nav class="nav">
            <a class="logo" href="index.php"><i class="fas fa-qrcode"></i></a>
        </nav>
    </header>
    <main class="not-uploaded">
        <!-- Achieve stay on same page when uploading a file -->
        <section class="upload-section container">
            <h2>Sube tu Comprobante Fiscal</h2>
            <!-- <form class="form" action="uploadedFile.php" method="post" enctype="multipart/form-data"> -->
            <form class="form" onsubmit="getData();return false" method="post" enctype="multipart/form-data">
                <!-- Show table in the same page -->
                <div class="field">
                    <div class="upload-input-container">
                        <p>Arrastra aquí el PDF del Comprobante Fiscal o puedes dar click en el botón para seleccionarlo</p>
                        <div class="flex-upload-container">
                            <label class="no-select" for="fileToUpload">Subir Archivo</label>
                        </div>
                        <!-- <input type="file" name="fileToUpload" accept=".pdf" id="fileToUpload" onchange="this.form.submit()"> -->
                    </div>
                </div>
                <input type="submit" value="Upload Image" name="submit">
            </form>
            <!-- <div class="lds-dual-ring"></div> -->
        </section>
    </main>
    <!-- <div class="loading-container">
        <div class="loading">
            <div class="lds-ring"><div></div><div></div><div></div><div></div></div>
        </div>
    </div> -->
    <!-- <div class="alert-container in">
        <div class="alert in">
            <span></span>
            <p class="alert-title">El archivo no se puede subir</p> 
            <p class="alert-info">El formato debe ser PDF</p>
            <button class="button">Ok</button>
        </div>
    </div> -->
    <script src="build/js/bundle.min.js"></script>
</body>
</html>