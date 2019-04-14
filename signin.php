<!-- // Aria Kumar(ak8fk) and Neha Chopra(nc3tq)
 -->
<?php
session_start();
?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href='style.css' rel='stylesheet'>
<!------ Include the above in your HEAD tag ---------->

<script src="https://code.jquery.com/jquery-2.1.0.min.js"></script>

<style>
    .feedback {
        font-style: italic;
        color: red;
    }
</style>

<script>
    function checkEmail() {
        var msg = document.getElementById("user-msg");
        if (this.value.length < 8 && this.value.length > 0)
            msg.textContent = "Username is too short";
        else
            msg.textContent = "";
    }
    var user = document.getElementById("email");
    user.addEventListener('blur', checkEmail, false);
</script>


<body>



    <!-- Sign in form that also validates the information. Determines if someone inputted anything in the fields
    before submiting. -->

    <div id="formWrapper">
        <div id="form">

            <div class="logo">
                <h1 class="text-center head">Tutor Hoos</h1>
            </div>
            <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" onsubmit="return (checkEmail())">
                <input type="text" class="form-style form-control" name="email " id="email" placeholder="Email" autofocus required />
                <div id="user-msg" class="feedback"></div>
                <br />
                <input type="password" class="form-style form-control" name="pwd" id="pwd" placeholder="Password" required />
                <div id="pwd-msg" class="feedback"></div>
                <br />
                <input type="submit" class="form-style login pull-center" name="login" value="Log in" />
                <p><a href="#">Forgot Password?</a></p>
                <p><a href="registration1.php">Register</a></p>
                <!-- use input type="submit" with the required attribute -->
            </form>
            <div class="form-item">
                <div class="clear-fix"></div>
            </div>
        </div>
    </div>

    <?php


    $hostname = "localhost";
    $database = "project";
    $username = "nc3tq";
    $password = "WebPL4640";


    $conn = new mysqli($hostname, $username, $password, $database);



    function reject($entry)
    {
        echo 'Please <a href="signin.php">Log in </a>';
        exit();    // exit the current script, no value is returned
    }


    $username = "";
    $email = "";
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];

        $sql_u = "SELECT * FROM project WHERE email='$email'";
        $res_e = mysqli_query($db, $sql_e);

        if (mysqli_num_rows($res_u) > 0) {
            $name_error = "Sorry... username already taken";
        } else if (mysqli_num_rows($res_e) > 0) {
            $email_error = "Sorry... email already taken";
        } else {
            $query = "INSERT INTO users (username, email, password) 
                      VALUES ('$username', '$email', '" . md5($password) . "')";
            $results = mysqli_query($db, $query);
            echo 'Saved!';
            exit();
        }
    }




    if ($_SERVER['REQUEST_METHOD'] == "POST" && strlen($_POST['email']) > 0) {
            $email = trim($_POST['email']);
            if (!ctype_alnum($email)) // ctype_alnum() check if the values contain only alphanumeric data
                reject('Email');

            if (isset($_POST['pwd'])) {
                    $pwd = trim($_POST['pwd']);
                    if (!ctype_alnum($pwd))
                        reject('Password');
                    else {
                            // setcookie(name, value, expiery-time)
                            // setcookie() function stores the submitted fields' name/value pair
                            setcookie('email', $email, time() + 3600);
                            setcookie('pwd', md5($pwd), time() + 3600); // create a hash conversion of password values using md5() function

                            // redirect the browser to another page using the header() function to specify the target URL
                            header('Location: dashboard.php');
                        }
                }
        }
    ?>




</body>







</html>


<!-- Photo by Joanna Kosinska on Unsplash -->