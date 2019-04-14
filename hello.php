<?php
function createAccount($name, $phone, $email, $pwd, $bio, $classes, $tutor)
{
    require('connect-db.php');
    echo "hi";
    echo $_SERVER['REQUEST_METHOD'];


    $query = "SELECT * from Students where Email='$email'";
    if ($result = mysqli_query($conn, $query)) {
        echo "Hi";
        if (mysqli_num_rows($result) > 0) {
            echo "Exists";
        } else {
            // $sql = "INSERT INTO Students(Name_User, Phone, Email,User_Password, Biography, Classes, Tutor) VALUES ('$name','$phone','$email','$pwd','$bio', '$classes', '$tutor')";
            $sql = "INSERT INTO Students (name_user, phone, email,user_password, biography, classes, tutor) 
            VALUES ('Neha','$phone','$email','$pwd','$bio', '$classes', '$tutor')";

            echo "$name";
            if ($conn->query($sql) === TRUE) {
                #header('location:http://localhost/WebApplications/dashboard.php');

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    $conn->close();
}
