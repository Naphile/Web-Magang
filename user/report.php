<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telkom Report System</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <div class="header-report">
            <a href="index.php">
                <img class="logo-panjang" src="../assets/img/logo-panjang.jpg" alt="Logo Telkom">
            </a>
            <div class="text-trs">
                <h1>Telkom Report System</h1>
            </div>
        </div>
    </header>
    <div class="container">
        <form action="submit.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama_proyek">Nama Proyek:</label>
                <input type="text" id="nama_proyek" name="nama_proyek" required>
            </div>
            <div class="form-group">
                <label for="nama_mitra">Nama Mitra:</label>
                <input type="text" id="nama_mitra" name="nama_mitra" required>
            </div>
            <div class="form-group">
                <label for="file_mancore">File Mancore:</label>
                <input type="file" id="file_Mancore" name="file_mancore" accept=".dxf, .dwg, .pdf" required>
            </div>
            <div class="form-group">
                <label for="file_kml">File KML:</label>
                <input type="file" id="file_kml" name="file_kml" accept=".kml, .pdf" required>
            </div>
            <div class="form-group">
                <label for="file_apd">File APD:</label>
                <input type="file" id="file_apd" name="file_apd" accept=".apd, .pdf" required>
            </div>


            <div class="fase-group">
                <h3>Foto Efiden Pembangunan</h3>
                <label class="custom-file-upload" for="file1">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                            <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="text">
                        <span>Click to upload image</span>
                    </div>
                    <input type="file" id="file" accept="image/*" multiple required>
                </label>
            </div>

            <div class="fase-group">
                <h3>Foto Validasi (QR)</h3>
                <label class="custom-file-upload" for="file2">
                    <div class="icon">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                            <path fill="" d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z" clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div class="text">
                        <span>Click to upload image</span>
                    </div>
                    <input type="file" id="file" accept="image/*" required>
                </label>
            </div>

            <div class="tombol">
                <button>
                    <span>Submit</span>
                </button>
            </div>

        </form>
    </div>

</body>

</html>