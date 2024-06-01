<?php
// Membuat koneksi
$conn = mysqli_connect('localhost', 'root', '', 'db_bonaga') or die ('Gagal terhubung ke Database');

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data dari database
$sql = "SELECT * FROM reports";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header-admin">
        <h1 class="admin-panel">Admin Panel<h1>
        <div class="profile-container">
            <img class="photo" src="<?= $_SESSION['picture']?>" alt="Photo Profile" id="profilePhoto">
            <div class="dropdown-content" id="dropdownMenu">
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </header>
    <content>
        <div class="container">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>
                                    <td>{$row['nama_proyek']}</td>
                                    <td>{$row['nama_mitra']}</td>
                                    <td><a href='{$row['file_mancore']}'>Download</a></td>
                                    <td><a href='{$row['file_kml']}'>Download</a></td>
                                    <td><a href='{$row['file_apd']}'>Download</a></td>
                                    <td><a href='{$row['foto_efiden']}'>View</a></td>
                                    <td><a href='{$row['foto_validasi']}'>View</a></td>
                                    <td>{$row['created_at']}</td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No reports found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </content>
    <script src="script.js"></script>
</body>
</html>

<?php
$conn->close();
?>
