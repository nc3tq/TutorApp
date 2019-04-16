<!-- // Aria Kumar(ak8fk) and Neha Chopra(nc3tq)
 -->
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
            <form action="signin.php" method="post" onsubmit="return (checkEmail())">
                <input type="text" class="form-style form-control" name="email" id="email" placeholder="Email" autofocus required />
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
    session_start();



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



    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connected successfully";
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        // $name = $_POST["name"];

        echo $pwd;
        echo $email;

        if (isset($_POST['login'])) {
            echo "Not working";
            $select = mysqli_query($conn, "SELECT * FROM Students WHERE email = '$email' AND user_password = '$pwd'");
            echo mysqli_num_rows($select) > 0;
            if (mysqli_num_rows($select) > 0) {
                $row = mysqli_fetch_array($select);
                $username = $row['name_user'];
                // $user_name = mysqli_query($conn, "SELECT * FROM Students WHERE name_user = '$_POST['name']'");
                $_SESSION['email'] = $email;
                setcookie('name_user', $username, time()+3600);
                setcookie('email', $email, time() + 3600);
                setcookie('pwd', $pwd, time() + 3600);
                header('Location: dashboard.php');
                echo "Working";
            } else {
                echo "Either email or password is incorrect";
            }
        }
    }

    // if (isset($email)) {
    //     // -- $email = $_POST['email'];
    //     // -- $pwd = $_POST['pwd'];

    //     $result1 = mysql_query(" SELECT name_user, user_password FROM Students WHERE name_user = '" . $email . "' and  user_password = '" . $pwd       . "'");


    //     if (mysql_num_rows($result1) > 0) {
    //         $_SESSION['name'] = $name;
    //     } else {
    //         echo 'The username or password are incorrect!';
    //     }
    // }

    // mysql_close()




    // if (isset($_POST['login'])) {

    //     if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    //         exit('Invalid email address'); // Use your own error handling ;)
    //     }
    //     $select = mysqli_query($co      nn, "SELECT `email` FROM `project` WHERE `email` = '"   .   $ _ P      OST['e     m ail'] . "'") or exit(mysqli_error($conn));
    //     if (mysqli_num_rows($select)) {
    //         exit('This email is already being used');
    //     }
    // }




    // if ($_SERVER['REQUEST_MET      HOD     ' ] == "POST" && strlen($_POST['email']) > 0) {
    //     $email = trim($_POST['email']);
    //     if (!ctype_alnum($email)) // ctype_alnum() check if the values contain only alphanumeric data
    //         reject('Email');

    //     if (isset($_POST['pwd'])) {
    //         $pwd = trim($_POST['pwd']);
    //         if (!ctype_alnum($pwd))
    //             reject('Password');
    //         else {
    //             // setcookie(name, value, expiery-time)
    //             // setcookie() function stores the submitted fields' name/value pair
    //             setcookie('email', $email, time() + 3600);
    //             setcookie('pwd', md5($pwd), time() + 3600); // create a hash conversion of password values using md5() function

    //             // redirect the browser to another page using the header() function to specify the target URL
    //             header('Location: dashboard.php');
    //         }
    //     }
    // }
    ?>




</body>







</html>


<!-- Photo by Joanna Kosinska on Unsplash -->
