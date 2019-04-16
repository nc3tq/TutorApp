<!-- <!DOCTYPE html>
<html lang="en" class="gr__cs_virginia_edu">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge"> required to handle IE -->

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" /> -->
<!-- <link rel="stylesheet" href="css/bootstrap.min.css" /> if you downloaded bootstrap to your computer  -->
<link rel="stylesheet" href="index.css">
<!-- required scripts for IE -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" href="style/index.css">
<link rel="stylesheet" href="nav.css">


<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<!-- Awesome Fonts -->
<link href="style/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<title>Dashboard</title>

</head>

<body>












</body>



<?php
$hostname = "localhost";
$database = "project";
$username = "nc3tq";
$password = "WebPL4640";


$conn = new mysqli($hostname, $username, $password, $database);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully";
}



if (!isset($_COOKIE['email']) && !isset($_SESSION['email'])){
    header('Location: signin.php');
}

if (isset($_GET['name'])) {
    $name = $_GET['name'];
    $sql = "SELECT * FROM Tutor WHERE tutor_name='$name'";

    $result = $conn->query($sql);

    if (mysqli_num_rows($result) > 0) {

        if ($row = $result->fetch_assoc()) {
            echo '<h1>' . $row["tutor_name"] . "'s Profile</h1>";
            echo '<table>';
            echo '<tr><td>Name:</td><td>' . $row["tutor_name"] . '</td></tr>';
            echo '<tr><td>Bio:</td><td>' . $row["tutor_bio"] . '</td></tr>';
            echo '<tr><td>Classes Tutoring:</td><td>' . $row["tutor_classes"] . '</td></tr>';
        }
        echo '</table>';
    } else {
        echo "0 results";
    }
} else {

    echo '<h2>All our members:</h2>';

    $sql = "SELECT * FROM Tutor";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            echo '<h1>' . $row["tutor_name"] . "'s Profile</h1>";
            echo '<table>';
            echo '<tr><td>Name:</td><td>' . $row["tutor_name"] . '</td></tr>';
            echo '<tr><td>Bio:</td><td>' . $row["tutor_bio"] . '</td></tr>';
            echo '<tr><td>Classes Tutoring:</td><td>' . $row["tutor_classes"] . '</td></tr>';
            echo '</table>';
        }
    } else {
        echo "0 results";
    }
}

?>


</html>