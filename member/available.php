<?php
		include_once './db.php';
		
    if(isset($_POST['action']) && $_POST['action'] == 'availability')
    {
        $username       = mysqli_real_escape_string($conn,$_POST['username']); // Get the username values
        $query  = "SELECT UserName FROM clients WHERE UserName='".$username."'";
        $res    = mysqli_query($conn,$query);
        $count  = mysqli_num_rows($res);
        echo $count;
    }
?>