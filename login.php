<?php
session_start();
date_default_timezone_set('Asia/Jakarta');

if(isset($_SESSION['logged_in'])){
    header('Location: user/index.php');
    exit();
}

$conn = mysqli_connect('localhost', 'root', '', 'db_bonaga') or die('Gagal terhubung ke database');

require_once 'vendor/autoload.php';

$client_id      = '919832777657-lld3ckloi39k4unat0qkah54jvgtgupi.apps.googleusercontent.com';
$client_secret  = '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';
$redirect_uri   = 'http://localhost/bonaga/login.php';

$client = new Google_Client();
$client->setClientId($client_id);
$client->setClientSecret($client_secret);
$client->setRedirectUri($redirect_uri);
$client->addScope('email');
$client->addScope('profile');

if(isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    if(!isset($token['error'])) {
        $client->setAccessToken($token['access_token']);
        $service = new Google_Service_Oauth2($client);
        $profile = $service->userinfo->get();

        $g_name     = $profile['name'];
        $g_email    = $profile['email'];
        $g_photo    = $profile['picture'];  // Note: harus pakai 'picture' supaya muncul foto profilnya
        $g_id       = $profile['id'];
        $currtime   = date('Y-m-d H:i:s');

        $query_check = 'SELECT * FROM users WHERE oauth_id = "'.$g_id.'"';
        $run_query_check = mysqli_query($conn, $query_check);
        $d = mysqli_fetch_object($run_query_check);

        if($d) {
            $query_update = 'UPDATE users SET fullname = "'.$g_name.'", email = "'.$g_email.'", picture = "'.$g_photo.'", last_login = "'.$currtime.'" WHERE oauth_id = "'.$g_id.'"';
            mysqli_query($conn, $query_update);
        } else {
            $query_insert = 'INSERT INTO users (fullname, email, picture, oauth_id, last_login) VALUES ("'.$g_name.'", "'.$g_email.'", "'.$g_photo.'", "'.$g_id.'", "'.$currtime.'")';
            mysqli_query($conn, $query_insert);
        }

        $_SESSION['logged_in']      = true;
        $_SESSION['access_token']   = $token['access_token'];
        $_SESSION['uname']          = $g_name;
        $_SESSION['picture']        = $g_photo;
        

        header('Location: user/index.php');
        exit();
    } else {
        echo "Login gagal";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="piclog">
        <img src="assets/img/logo2.jpg" alt="" width="100px">
    </div>
    <div class="container">
        <form action="" class="form">
            <p>Login</p>
            <button class="signin">
                <svg viewBox="0 0 256 262" preserveAspectRatio="xMidYMid" xmlns="http://www.w3.org/2000/svg">
                    <path d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027" fill="#4285F4"></path>
                    <path d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1" fill="#34A853"></path>
                    <path d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782" fill="#FBBC05"></path>
                    <path d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251" fill="#EB4335"></path>
                </svg>
                <a href="<?= $client->createAuthUrl(); ?>">Continue with Google</a>
            </button>
        </form>
    </div>
</body>
</html>
