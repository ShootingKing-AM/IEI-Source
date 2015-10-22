<?php
include('../db.php');
if($_POST)
{
    $q = mysqli_real_escape_string($conn, $_POST['search']);
	$sql = "SELECT Code FROM clients WHERE Code like '%$q%'";
	$qury = mysqli_query($db, $sql);
    while($row = mysqli_fetch_array($qury))
    {
        $username   = $row['Code'];
        $b_username = '<strong>'.$q.'</strong>';
        $final_username = str_ireplace($q, $b_username, $username);
        ?>
            <div class="show" align="left">
                <span class="name"><?php echo $final_username; ?></span>&nbsp;<br/>
            </div>
        <?php
    }
}
?>