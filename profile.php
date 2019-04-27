<!-- // Aria Kumar(ak8fk) and Neha Chopra(nc3tq)
<?php

/*
dashboard
<a href="profile.php">Profile</a>
<a href="profile.php?logout=1">Logout</a>

*/

// This logs the user out and also cancels out the session and the cookies
if(!empty($_GET['logout'])) {
   
    setcookie('name_user',$name, time() - 3600); // note, setting name of cookie but NO content - erases cookie content
    setcookie('email', $email, time() - 3600);
    unset($_SESSION['email']);
    unset($_SESSION['name_user']);

    // die('Good bye user!!');
    header('Location:signin.php');
}
?>
<!doctype html>
<head><title>Profile</title></head>

<?php

// This is a profile for the student. The favorited professors will appear when they like them

if (isset($_COOKIE['name_user'])) {
    echo 'Welcome '. $_COOKIE['name_user'];
  } else {
    echo 'You are not signed in!';
  } 



?>


</body></html>
