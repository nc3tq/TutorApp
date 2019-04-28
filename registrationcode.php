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
 
 // This gets the method for the post and and sees if a user has registered before. If they have, then 
 // an error will show and they will need to login again. If they have not, then their information will 
 // be stored in the database. 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     $name = $_POST["name"];
     $phone = $_POST["phone"];
     $email = $_POST["email"];
     $pwd = $_POST["pwd"];
     $bio = $_POST["bio"];
     $tutor = $_POST["tutor"];
     $tutor_name = $_POST["name"];
 
 
     // $classes = implode(',', $_POST['classes']);
 
 
     // If the user chooses to be a tutor, then those credentials will be added to a new table. 
     $query = "SELECT * from Students where email='$email'";
     if ($result = mysqli_query($conn, $query)) {
         if (mysqli_num_rows($result) == 0) {
 
             // $sql = "INSERT INTO Students(Name_User, Phone, Email,User_Password, Biography, Classes, Tutor) VALUES ('$name','$phone','$email','$pwd','$bio', '$classes', '$tutor')";
             $sql = "INSERT INTO Students (name_user, phone, email,user_password, biography, tutor) 
         VALUES ('$name','$phone','$email','$pwd','$bio', '$tutor')";
             if (($_POST['tutor'] == '1')) {
                 $tutor_bio = $_POST['tutorbio'];
                 $tutor_classes = implode(',', $_POST['tutorclass']);
                 // echo "working";
                 $sql1 = "INSERT INTO Tutor (tutor_name, tutor_bio, tutor_classes,tutor_email) 
             VALUES ('$name','$tutor_bio', '$tutor_classes','$email')";
                 mysqli_query($conn, $sql1);
                 // echo $sql1;
             }
             //A cookie will be set for the user so that when they login they will be redirected to the
             // dashboard and can start using the tutor app.
             setcookie('name_user', $name, time() + 3600);
             setcookie('email', $email, time() + 3600);
             setcookie('pwd', $pwd, time() + 3600);
             // header('Location: dashboard.php');
             if ($conn->query($sql) === TRUE) {
                 header('location:dashboard.php');
             } else {
                 echo "Error: " . $sql . "<br>" . $conn->error;
             }
         }
     }
 }
 
 $conn->close();
 ?>