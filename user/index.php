<?php
session_start();
if(!isset($_SESSION['logged_in'])){
    header('location: ../login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="header">
            <img src="../assets/img/logo-panjang.jpg" alt="Logo Telkom" class="logo" id="sidebarToggle">
            <div class="header-profile">
                <img class="photo" src="<?= $_SESSION['picture']?>" alt="Photo Profile">
                <h1><?= $_SESSION['uname'] ?></h1>
            </div>
        </div>
    </header>

    <div class="sidebar" id="sidebar">
        <h3>TELKOM REPORT SYSTEM</h3>
        <p>____________________________</p>
        <ul>
            <li class="user-profil" id="userprofil"><a href="index.php" class="profil"><img src="../assets/img/home-regular-24.png" alt="User Account">Home</a></li>
            <li class="report-pelaporan" id="reportpelaporan"><a href="report.php" class="pelaporan"><img src="../assets/img/report-solid-24 (1).png" alt=""> Pelaporan</a></li>
        </ul>
        <a href="logout.php">
            <button class="Btn">
                <div class="sign">
                    <svg viewBox="0 0 512 512">
                        <path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path>
                    </svg>
                </div>
                <div class="text">Logout</div>
            </button>
        </a>c
    </div>

    <div class="content" id="content">
        <h1 class="content-welcome">Welcome,</h1>
        <h1 class="content-name"><?= $_SESSION['uname'] ?></h1>
        <p></p>
    </div>

    <script src="script.js"></script>
</body>
</html>