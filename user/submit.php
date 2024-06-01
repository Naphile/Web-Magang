<?php
// Membuat koneksi
$conn = mysqli_connect('localhost', 'root', '', 'db_bonaga') or die ('Gagal terhubung ke Database');

// Mengecek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Menangani data yang diunggah
$nama_proyek = $_POST['nama_proyek'];
$nama_mitra = $_POST['nama_mitra'];

// Menentukan direktori tujuan untuk menyimpan file yang diunggah
$target_dir = "../uploads/";

// Mengunggah file Mancore
$file_mancore = $_FILES["file_mancore"]["name"];
$target_file_mancore = $target_dir . basename($file_mancore);
move_uploaded_file($_FILES["file_mancore"]["tmp_name"], $target_file_mancore);

// Mengunggah file KML
$file_kml = $_FILES["file_kml"]["name"];
$target_file_kml = $target_dir . basename($file_kml);
move_uploaded_file($_FILES["file_kml"]["tmp_name"], $target_file_kml);

// Mengunggah file APD
$file_apd = $_FILES["file_apd"]["name"];
$target_file_apd = $target_dir . basename($file_apd);
move_uploaded_file($_FILES["file_apd"]["tmp_name"], $target_file_apd);

// Mengunggah foto Efiden
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uploadDir = '../uploads/';  // Direktori untuk menyimpan file yang diunggah
    $uploadOk = true;

    // Inisialisasi variabel untuk menyimpan path file yang diunggah
    $target_file_foto_efiden = '';
    $target_file_foto_validasi = '';

    // Proses file1
    if (isset($_FILES['file1']) && $_FILES['file1']['error'] == UPLOAD_ERR_OK) {
        $target_file_foto_efiden = $uploadDir . basename($_FILES['file1']['name']);
        if (move_uploaded_file($_FILES['file1']['tmp_name'], $target_file_foto_efiden)) {
            echo "File 1 telah diunggah: " . $target_file_foto_efiden . "<br>";
        } else {
            echo "Terjadi kesalahan saat mengunggah file 1.<br>";
            $uploadOk = false;
        }
    } else {
        echo 'File 1 tidak diunggah atau terjadi kesalahan.<br>';
        $uploadOk = false;
    }

    // Proses file2
    if (isset($_FILES['file2']) && $_FILES['file2']['error'] == UPLOAD_ERR_OK) {
        $target_file_foto_validasi = $uploadDir . basename($_FILES['file2']['name']);
        if (move_uploaded_file($_FILES['file2']['tmp_name'], $target_file_foto_validasi)) {
            echo "File 2 telah diunggah: " . $target_file_foto_validasi . "<br>";
        } else {
            echo "Terjadi kesalahan saat mengunggah file 2.<br>";
            $uploadOk = false;
        }
    } else {
        echo 'File 2 tidak diunggah atau terjadi kesalahan.<br>';
        $uploadOk = false;
    }

    // Cek apakah semua file berhasil diunggah
    if ($uploadOk) {
        // Lakukan sesuatu dengan file yang diunggah
        echo "Semua file telah diunggah dengan sukses.<br>";
        echo "File 1 path: " . $target_file_foto_efiden . "<br>";
        echo "File 2 path: " . $target_file_foto_validasi . "<br>";
    } else {
        echo "Satu atau lebih file gagal diunggah.<br>";
    }
} else {
    echo 'Metode pengiriman tidak valid.<br>';
}

// Menyimpan data ke dalam database
$sql = "INSERT INTO reports (nama_proyek, nama_mitra, file_mancore, file_kml, file_apd, foto_efiden, foto_validasi)
        VALUES ('$nama_proyek', '$nama_mitra', '$target_file_mancore', '$target_file_kml', '$target_file_apd', '$target_file_foto_efiden', '$target_file_foto_validasi')";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil disimpan!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit</title>
</head>
<body>
    <a href="index.php">Back</a>
</body>
</html>