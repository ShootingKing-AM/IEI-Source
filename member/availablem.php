<?php
		include_once './db.php';
    if(isset($_POST['action']) && $_POST['action'] == 'availability')
    {
        $m       = mysqli_real_escape_string($conn,$_POST['username']); // Get the username values
        $query  = "SELECT Mobile FROM clients WHERE Mobile='".$m."'";
        $res    = mysqli_query($conn,$query);
        $count  = mysqli_num_rows($res);
        echo $count;
    }
?>