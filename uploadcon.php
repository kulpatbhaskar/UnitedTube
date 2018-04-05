<?php 
session_start();
include_once 'user/dbconnect.php';
$user_id= $_SESSION['usr_id'];




$name= $_FILES['file']['name'];

$tmp_name= $_FILES['file']['tmp_name'];

$submitbutton= $_POST['submit'];

$position= strpos($name, "."); 

$fileextension= substr($name, $position + 1);

$fileextension= strtolower($fileextension);

$description= $_POST['description_entered'];

$category= $_POST['cat'];

$success= -1;
$descript= 0;

if (empty($description))
{
$descript= 1;
}

if (isset($name)) 
{

	if($category=="movie")
	{
		$path= 'movie/';
	}
	else if($category=="songs")
	{
		$path= 'songs/';
	}
	else if($category=="news")
	{
		$path= 'news/';
	}

	if (!empty($name))
	{
		if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm") && ($fileextension !== "mkv"))
		{
			$success=0;
			echo "The file extension must be .mp4, .ogg, or .webm in order to be uploaded";
		}
		else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm") || ($fileextension == "mkv"))
		{
			$success=1;
			if (move_uploaded_file($tmp_name, $path.$name))
			{
				echo 'Uploaded!';
				header("Location: urvideo.php");
			}
		}
	}
}



if((!empty($description)) && ($success == 1))
{
	$insert_query= "INSERT INTO user_video (id, v_name, v_dir, cat)
VALUES ('$user_id','$description', '$path/$name', '$category')";
	mysqli_query($con, $insert_query);
}


mysqli_close($con);

?>