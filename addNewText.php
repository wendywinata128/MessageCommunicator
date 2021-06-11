<?php
include './database.php';

$message = $_POST['message'];
$key = $_POST['key'];

if (isset($_POST['message']) && isset($_POST['key'])) {
    $message = $_POST['message'];
    $key = $_POST['key'];

    $query = mysqli_query($con, "INSERT INTO message(`key`,`message`)
    VALUES ('$key','$message')") or die(mysqli_error($con));

    // $query = mysqli_query($con, "INSERT INTO users(username, password, nama, nim, u
    // km) VALUES ('$username', '$password', '$nama', '$nim', '$ukm')") or die(mysqli_error($con));


    if ($query) {
        echo '
            <script>
                alert("Message Sended Success"); window.location = "./index.php"
            </script>
            
        ';
    } else {
        echo '
            <script>
                alert("Message Sended Failed"); window.location = "./index.php"
            </script>
        ';
    }
} else {
    echo '
        <script>
            alert("Message Sended Failed"); window.location = "./index.php"
        </script>
    ';
}
