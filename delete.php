<?php
include_once 'user/dbconnect.php';
 

$video_id=$_GET['id'];
$sql = "DELETE FROM user_video WHERE v_id='$video_id'";
if(mysqli_query($con, $sql)){
    header("Location: urvideo.php");
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($con);
}
 
// Close connection
mysqli_close($con);
?>



