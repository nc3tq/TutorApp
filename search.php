<?php
$hostname = "localhost";
$database = "project";
$username = "nc3tq";
$password = "WebPL4640";

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    $search = isset($_POST['search']) ? $_POST['search'] : '';

    $query = "SELECT * FROM Tutor WHERE tutor_name LIKE '%" . $search . "%' OR tutor_email LIKE '%" . $search . "%' OR tutor_classes LIKE '%" . $search . "%'";

    $res = $conn->query($query);
}

?>
<!DOCTYPE html>
<html>

<!DOCTYPE html>
<html lang="en" class="gr__cs_virginia_edu">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- required to handle IE -->

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
    <!-- <link href="style/font-awesome.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="//s.w.org/wp-includes/css/dashicons.css?20150710" rel="stylesheet" type="text/css">

    <style>
        #name {
            font-weight: bold;
        }
    </style>




    <title>Home</title>

</head>

<body data-gr-c-s-loaded="true">

    <script src="./WebApplications/jquery.min.js"></script>
    <script src="./WebApplications/bootstrap.min.js"></script>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="search.php">Tutor Hoos</a>
        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> -->

        <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <form action="dashboard.php" class="form-inline my-2 my-lg-0 pull-right" style="padding-top: 10px;">
        <input class="form-control mr-sm-2" name='search' type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>


      Navigation bar for all the classes enrolled in. Students can select which website to go to:
      either browse for tutors depending on the specific class or see their previous favorited tutors -->

        <!-- </div>  -->
        <ul class="navbar-nav ml-auto my-lg-0 pull-right">
            <li class="nav-item">
                <a class="nav-link  my-2 my-lg-0 pull-right" style="align-content:right; padding-right:10px;" href="profile.php">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  my-2 my-lg-0 pull-right" style="align-content:right; padding-right:10px;" href="profile.php?logout=1">Log Out</a>
            </li>
        </ul>
    </nav>

    <div class="jumbotron jumbotron-fluid">
        <div ng-app="webproject" class="container">
            <!-- Sets a cookie name for the user, so that they are greeted when they login -->

            <h1 class="display-4">Welcome Back, <?php if (isset($_COOKIE['name_user'])) {
                                                    echo $_COOKIE['name_user'];
                                                } else {
                                                    echo 'Hello!';
                                                } ?></h1>
            <p class="lead">Browse through our tutors and contact them! </p>
        </div>
    </div>
    <!-- This is a display of all the favorited tutors. It is useful especially if a student wants to get quickly
      get into contact with one and schedule a meet up without having to search. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    <!-- <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });


        $(document).ready(function() {

            $('a.btn-favorite').on('click', function() {
                $(this).toggleClass('liked');
                $('.favorite-text,.unfavorite-text').toggle();
            });
        });
    </script> -->

    <div>

        <a href = 'search.php' class= "pull-left" style="padding-left: 20px;"><b> View All Tutors </b></a>
        <br>
        <form method="post" action="search.php" class="form-inline my-2 my-lg-0 pull-left" style="padding-left: 20px; padding-top: 10px;">
            <input type="text" name="search">
            <input type="submit" name="submit" value="Search">
        </form>
        <?php while ($row = $res->fetch_assoc()) {
            echo '<table style="width: 100%;" border="1px" class="bios" class="hoverTable">';
            echo "<tr>";

            echo "<td>";

            echo '<div id="name">' .  $row["tutor_name"] . '</div><br>';
            echo '<div> Email Me: ' . $row["tutor_email"] . '</div>';
            echo "<br>";
            echo $row["tutor_bio"];
            echo "<br>";
            echo $row["tutor_classes"];
            echo "<br>";
            //if this is last value in row, end row
            echo "</tr>";

            echo '</table>';
        } ?>
    </div>
</body>

</html>