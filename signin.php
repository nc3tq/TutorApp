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
                <div> <?php $hostname = "localhost";
                        $database = "project";
                        $username = "nc3tq";
                        $password = "WebPL4640";
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                            $email = $_POST["email"];
                            $pwd = $_POST["pwd"];

                            $conn = new mysqli($hostname, $username, $password, $database);
                            if (isset($_POST['login'])) {
                                $select = mysqli_query($conn, "SELECT * FROM Students WHERE email = '$email' AND user_password = '$pwd'");
                                if (mysqli_num_rows($select) == 0) {
                                    echo '<div>Either email or password is incorrect </div>';
                                }
                            }
                        } ?></div>
                        <br />
                <input type="submit" class="form-style login pull-center" name="login" value="Log in" />
                <p><a href="#">Forgot Password?</a></p>
                <p><a href="http://localhost:4200/">Register</a></p>
                <!-- use input type="submit" with the required attribute -->
            </form>
            <div class="form-item">
                <div class="clear-fix"></div>
            </div>
        </div>
    </div>
    <?php
    // Starts a session with the localhost, database, username, and password
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


    // sees if the connection has failed or has been successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else {
        echo "Connected successfully";
    }

    // This allows the user to signin to the account. It checks to see if the user is in the database and
    // if she or he is then they would be redirected to the dashboard. If not, then they will get an error that 
    // the email or password is incorrect and would need to sign up. 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = $_POST["email"];
        $pwd = $_POST["pwd"];
        // $name = $_POST["name"];

        echo $pwd;
        echo $email;

        if (isset($_POST['login'])) {
            $select = mysqli_query($conn, "SELECT * FROM Students WHERE email = '$email' AND user_password = '$pwd'");
            if (mysqli_num_rows($select) > 0) {
                $row = mysqli_fetch_array($select);
                $username = $row['name_user'];
                // This sets a cookie for the new user and also starts a session based on the email and
                // redirects the user to the dashboard page. 

                $_SESSION['email'] = $email;
                setcookie('name_user', $username, time() + 3600);
                setcookie('email', $email, time() + 3600);
                setcookie('pwd', $pwd, time() + 3600);
                header('Location: dashboard.php');
            } else {
                // This validates to see if the username was typed in correctly. 
                echo '<div Either email or password is incorrect </div>';
            }
        }
    }
    ?>




</body>







</html>


<!-- Photo by Joanna Kosinska on Unsplash -->