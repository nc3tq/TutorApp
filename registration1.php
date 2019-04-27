<!-- // Aria Kumar(ak8fk) and Neha Chopra(nc3tq)
 -->
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
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Material Design for Bootstrap fonts and icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">

    <!-- Material Design for Bootstrap CSS -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('body').bootstrapMaterialDesign();
        });
    </script>



    <title>Registration</title>
</head>

<style>
    fieldset {
        border: 3px solid black;
        padding: 20px;
    }
</style>

<script>
    function validatePassword(input) {
        if (input.value != document.getElementById('password').value) {
            input.setCustomValidity('Password Must be Matching.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>

<body>

    <div class="container">
        <!-- <h1>Registration
        </h1> -->

        <form action="registration1.php" method="post">
            <fieldset>
                <legend runat="server" visible="true" style="width:auto; margin-bottom: 0px; font-weight: bold; color: black;">
                    Registration
                </legend>

                <div class="form-group">
                    <label for="InputName" class="bmd-label-floating">Name (Ex. Jane Doe)</label>
                    <input type="name" class="form-control" id="InputName" name="name" pattern="^([A-Z]+[a-zA-Z]*)(\s|\-)?([A-Z]+[a-zA-Z]*)?(\s|\-)?([A-Z]+[a-zA-Z]*)?$" required>
                </div>
                <div class="form-group">
                    <label for="InputEmail1" class="bmd-label-floating">Email address (Ex. a@virginia.edu)</label>
                    <input type="email" name="email" class="form-control" id="InputEmail1" pattern="^(\D)+(\w)*((\.(\w)+)?)+@(\D)+(\w)*((\.(\D)+(\w)*)+)?(\.)[a-z]{2,}$" required>
                    <span class="bmd-help">This email will be used during login.</span>
                </div>
                <div><?php $hostname = "localhost";
                        $database = "project";
                        $username = "nc3tq";
                        $password = "WebPL4640";

                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                            $email = $_POST["email"];
                            $conn = new mysqli($hostname, $username, $password, $database);
                            $query = "SELECT * from Students where email='$email'";
                            if ($result = mysqli_query($conn, $query)) {
                                if ($email != '') {
                                    if (mysqli_num_rows($result) > 0) {
                                        echo "Email already exists!";
                                    }
                                }
                            }
                        } ?></div>

                <div class="form-group">
                    <label for="InputPassword1" class="bmd-label-floating">Password</label>
                    <input type="password" name="pwd" class="form-control" id="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                    <span class="bmd-help">Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters</span>

                </div>
                <div class="form-group">
                    <label for="InputPassword2" class="bmd-label-floating">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm_password" oninput="validatePassword(this)" required>
                </div>
                <div class="form-group">
                    <label for="InputPhone" class="bmd-label-floating">Phone Number (Ex. 123-123-123)</label>
                    <input type="phone" name="phone" class="form-control" id="InputPhone" pattern="^\D?(\d{3})\D?\D?(\d{3})\D?(\d{4})$" required>
                </div>

                <div class="form-group">
                    <label for="biography" class="bmd-label-floating">Biography</label>
                    <textarea class="form-control" name="bio" id="biography" rows="5" required></textarea>
                </div>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#multiple-checkboxes').multiselect({
                            filterPlaceholder: 'Search',
                            enableCaseInsensitiveFiltering: true,
                            includeSelectAllOption: true,
                        });
                    });
                </script>

                <div class='form-group'>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">


                    <strong>Select classes you would like to get tutored on:</strong>
                    <select for='classes' id="multiple-checkboxes" multiple="multiple" name="classes[]" class="form-control">
                        <optgroup label='Computer Science'>
                            <option id="cs1110">CS 1110</option>
                            <option id="cs2110">CS 2110</option>
                            <option id="cs2150">CS 2150</option>
                            <option id="cs2120">CS 2120</option>
                            <option id="cs3330">CS 3330</option>
                            <option id="cs4102">CS 4102</option>
                            <option id="cs4414">CS 4414</option>
                        </optgroup>
                        <optgroup label='Applied Mathematics'>
                            <option id="apma3080">APMA 3080</option>
                            <option id="apma3100">APMA 3100</option>
                        </optgroup>
                        <optgroup label='Commerce'>
                            <option id="comm2010">COMM 2010</option>
                            <option id="comm2020">COMM 2020</option>
                            <option id="comm3410">COMM 3410</option>
                            <option id="comm3420">COMM 3420</option>
                            <option id="comm3720">COMM 3720</option>
                        </optgroup>
                    </select>




                </div>



                <div class="form-group">
                    <label for="InputPhoto" class="bmd-label-floating">Profile photo</label>
                    <input type="file" class="form-control-file" name="photo" id="InputPhoto" accept="image/*" required>

                </div>
                <script>
                    show1 = () => {
                        document.getElementById('tutor_profile').style.display = 'none';
                    }
                    show2 = function() {
                        document.getElementById('tutor_profile').style.display = 'block';
                    }

                    // These are my arrow and anonymous functions that are used to hide and display content 
                </script>

                <div class="radio" id='tutoringprofile'>

                    <p>Would you like to sign up to become a tutor?</p>

                    <label> <input type="radio" id="yes" name="tutor" value="1" onclick="show2();" required>Yes<br></label>
                    <label><input type="radio" id="no" name="tutor" value="0" onclick="show1();" required> No<br></label>
                </div>

                <div id="tutor_profile" style="display:none;" class="form-group">


                    <div class="form-group">
                        <label for="biography" class="bmd-label-floating">Biography</label>
                        <textarea class="form-control" name="tutorbio" id="biography" rows="5" required></textarea>
                    </div>


                    <div class='form-group'>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">



                        <strong>Select classes you would like to tutor for (Press command/ctrl when you want to multi-select):</strong>
                        <select id="multiple-checkboxes" name="tutorclass[]" multiple="multiple" class="form-control" required>

                            <optgroup label='Computer Science'>
                                <option id="cs1110">CS 1110</option>
                                <option id="cs2110">CS 2110</option>
                                <option id="cs2150">CS 2150</option>
                                <option id="cs2120">CS 2120</option>
                                <option id="cs3330">CS 3330</option>
                                <option id="cs4102">CS 4102</option>
                                <option id="cs4414">CS 4414</option>
                            </optgroup>
                            <optgroup label='Applied Mathematics'>
                                <option id="apma3080">APMA 3080</option>
                                <option id="apma3100">APMA 3100</option>
                            </optgroup>
                            <optgroup label='Commerce'>
                                <option id="comm2010">COMM 2010</option>
                                <option id="comm2020">COMM 2020</option>
                                <option id="comm3410">COMM 3410</option>
                                <option id="comm3420">COMM 3420</option>
                                <option id="comm3720">COMM 3720</option>
                            </optgroup>
                        </select>


                    </div>

                </div>

                <div id='submit'>
                    <input class="btn btn-primary btn-sm" href='dashboard.php' type="submit" name="submit" role="button" onsubmit=' return validateForm()'>
                </div>


                <!-- <button type="submit" href = 'dashboard.php'class="btn btn-primary btn-raised">Submit</button> -->
            </fieldset>
        </form>


    </div>





</body>

</html>