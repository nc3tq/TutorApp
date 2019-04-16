<?php

/*
dashboard
<a href="profile.php">Profile</a>
<a href="profile.php?logout=1">Logout</a>

*/

if(!empty($_GET['logout'])) {
   
    setcookie('user_name'); // note, setting name of cookie but NO content - erases cookie content
    setcookie('email');
    die('Good bye user!!');
}
?>
<!doctype html>
<head><title>Profile</title></head>

[ ... ]

Pretend Profile Page

</body></html>
