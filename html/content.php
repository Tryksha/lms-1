<?php

include 'db_config.php';

session_start();

	//$course_id = $_SESSION['course_info'];


echo'
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<!-- startbootstrap.com -->
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

		<!-- Latest compiled javascript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

		<style>
			.container-fluid {
         background-color: #4CAF50;
			  padding: 5px 20px ;
			}
			/* Style the list */
			ul.breadcrumb {
			  background-color: #4CAF50;
			}
			/* Display list items side by side */
			ul.breadcrumb li {
			  display: inline;
			  font-size: 18px;
			}
			/* Add a slash symbol (/) before/behind each list item */
			ul.breadcrumb li+li:before {
			  padding: 5px;
			  color: white;
			  content: "/\00a0";
			}
			/* Add a color to all links inside the list */
			ul.breadcrumb li a {
			  color: white;
			  text-decoration: none;
			}

			/* Add user button */
			.dropdowna {
			  padding: 15px 20px;

			}

			/* Glyphicon */
			.btn-group {
			  float: right;
			  position: relative;
			}
			.info {
			  padding: 20px 20px;
			}
			.headings {
			  background-color: #4CAF50;
			  color: white;
			}

			/* Pagination */
			.pagination {
			  padding: 20px 20px;
			}
			.previous.disabled .page-link {
			  color: white;
			  background-color: #a6a6a6;
			  pointer-events: none;
			}
			.icon {
			  float: right;
			  position: relative;
			  padding: 50px 25px;
			  word-spacing: 15px;

			}

			.a{
				background: #30742C;
				color: white;
			}

			.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 10px;
  font-size: 15px;
  border: none;
  font-weight: bold;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
  margin-top: 10px;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: inherit;
  min-width: 150px;

  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}
#Module
{
	margin-top: 5px;
	margin-left: 5px;
	width: 50%;
}
.sub
{
	margin-left: 5px;
	background-color: #4CAF50;
	border: 0;
	text-transform: uppercase;
	box-shadow: 0px 2px 4px 0px rgba(0,0,0,.2);
	cursor: pointer;
	color: white;
	margin-left: 50%;
	margin-top: 10px;
	font-family: "roboto", sans-serif;

}
#video
{
		margin-top: 5px;
	margin-left: 5px;
	width: 50%;

}
#vid
{

	margin-top: 2px;
}
.sub1
{
	background-color: #4CAF50;
	border: 0;
	text-transform: uppercase;
	box-shadow: 0px 2px 4px 0px rgba(0,0,0,.2);
	cursor: pointer;
	color: white;
	font-family: "roboto", sans-serif;
	margin-left: 50%;
	margin-bottom: 10px;


}
.vi
{
	margin-left: 5px;
	margin-top: 10px;
	background-color: #4CAF50;
		border: 0;
	text-transform: uppercase;
	box-shadow: 0px 2px 4px 0px rgba(0,0,0,.2);
	font-family: "roboto", sans-serif;
	color: white;
	font-weight: bold;

}
.mo
{
		background-color: #4CAF50;
		border: 0;
	text-transform: uppercase;
	box-shadow: 0px 2px 4px 0px rgba(0,0,0,.2);
	font-family: "roboto", sans-serif;
	color: white;
	font-weight: bold;
}
			.btn1 {
  background-color: #4CAF50;
  color: white;
  margin-left: 10px;
  padding: 10px;
  padding-left: 15px;
  padding-right: 15px;
  font-size: 15px;
  border: none;
  font-weight: bold;
}
.hemod
{
margin-top: 30px;
padding-top: 10px;
padding-bottom: 10px;
padding-left: 10px;
background-color: silver;
font-size: 20px;
font-family: Roboto;
border-radius: 10px;

}
.image
{
	border: solid 1px grey;
	border-radius: 5px;
	box-shadow: 0px 2px 4px 0px rgba(0,0,0,.2);
}
video
{
	margin-left: 10px;
	box-shadow: 0px 2px 4px 0px rgba(0,0,0,.2);

}
p
{
	margin-left: 20%;
}
.course-img{
	width:30%;
}
.course-info{
	width:60%;
}

		</style>
	</head>

	<body>
		<div class="container-fluid">
			<ul class="breadcrumb">
				<li><a href="admin.php">Home</a></li>
				<li style="font-size:25px;"><a href="#">Courses</a></li>
			</ul>
		</div>

		<div class="w3-container">';

		if (isset($_GET['link']))
		{
			$course_id=$_GET['link'];
		}


		$sql = "SELECT * FROM courses where COURSE_ID = ?";

		$stmt1 = mysqli_prepare($conn, $sql);
		mysqli_stmt_bind_param($stmt1, 's', $course_id);


		if(mysqli_stmt_execute($stmt1))
		{
			$result1 = mysqli_stmt_get_result($stmt1);
			while($row = mysqli_fetch_assoc($result1))
			{
					echo '<div class="course-img"><img  class="image" src ="'.$row["COURSE_IMG"].'" width="200px" height="150px"style="margin-top: 10px;"></div>
           <div class="course-info"><span style="font-family: roboto; font-size: 30px;"> '.$row["COURSE_NAME"].'<br>
					 </span><span style="font-family: roboto; font-size: 15px;">'.$row["DESCRIPTION"] .'</span><br></div>
           <div class="dropdown">  <button class="dropbtn"> Add </button>  <div class="dropdown-content">
            <button class="mo" onclick="document.getElementById(\'id01\').style.display=\'block\'">Module</button>
            <button class="vi" onclick="document.getElementById(\'id02\').style.display=\'block\'">Video</button>  </div>
           </div><span><button class="btn1">Edit Course</button></span>
				  ';

			 }
		 }

		 if($_SERVER["REQUEST_METHOD"] == "POST")
		 {

			 if(isset($_POST["Module"]))
			 {
				 $module=$_POST["Module"];
				 $module_id=10001;

			 	$sql1 = "SELECT * FROM module WHERE MODULE_ID=(SELECT max(MODULE_ID) FROM module where COURSE_ID= ? ) ";

				if($stmt1 = mysqli_prepare($conn, $sql1))
					mysqli_stmt_bind_param($stmt1, "s",$course_id);

					if(mysqli_stmt_execute($stmt1))
					{
						$result1 = mysqli_stmt_get_result($stmt1);
						while($row = mysqli_fetch_assoc($result1))
						{
								 $module_id = $row['MODULE_ID']+1;
						}
				  }

					$date=date('y-m-d');

					$sql2 = "UPDATE courses SET UPDATE_DATE=? WHERE COURSE_ID= ?  ";

					if($stmt2 = mysqli_prepare($conn, $sql2))
						mysqli_stmt_bind_param($stmt2, "ss", $date, $course_id);

						if(mysqli_stmt_execute($stmt2))
						{
					   	mysqli_stmt_store_result($stmt2);
					  }


							$sql = "INSERT INTO module (COURSE_ID,MODULE_NAME,MODULE_ID) VALUES (?, ?, ?)";
							mysqli_error($conn);

							if($stmt = mysqli_prepare($conn, $sql))
								mysqli_stmt_bind_param($stmt, "ssd",$course_id,$module,$module_id);

						 if(mysqli_stmt_execute($stmt))
							{
								mysqli_stmt_store_result($stmt);
						 // echo "New record created successfully";
							}
						 else {
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}

						}

						 if(isset($_POST["video"])){

							 $module="INTRO";
							 $module_id=10000;

							 $sql1 = "SELECT * FROM module WHERE MODULE_ID=(SELECT max(MODULE_ID) FROM module where COURSE_ID=?) ";

							 if($stmt1 = mysqli_prepare($conn, $sql1))
 								mysqli_stmt_bind_param($stmt1, "s",$course_id);

 								if(mysqli_stmt_execute($stmt1))
 								{
 									$result1 = mysqli_stmt_get_result($stmt1);
 									while($row = mysqli_fetch_assoc($result1))
 									{
			 								 $module = $row['MODULE_NAME'];
											 $module_id=$row['MODULE_ID'];
			 						}
			 					}


								$date=date('y-m-d');

								$sql2 = "UPDATE courses SET UPDATE_DATE=? WHERE COURSE_ID= ?  ";

								if($stmt2 = mysqli_prepare($conn, $sql2))
									mysqli_stmt_bind_param($stmt2, "ss", $date, $course_id);

									if(mysqli_stmt_execute($stmt2))
									{
								   	mysqli_stmt_store_result($stmt2);
								  }



							 $maxsize = 99999999999515242880; // 5MB

              $video = $_FILES['vid']['name'];
              $target_dir = "assets/video/";
						  $target_file = $target_dir . $_FILES["vid"]["name"];

              $query = "INSERT INTO module(VIDEO_NAME,VIDEO_LOCATION,COURSE_ID,MODULE_NAME,MODULE_ID) VALUES('".$_POST["video"]."','".$target_file."', ?, ?, ?)";

							if($stmt = mysqli_prepare($conn, $query))
								mysqli_stmt_bind_param($stmt, "ssd",$course_id,$module,$module_id);

						 if(mysqli_stmt_execute($stmt))
							{
								mysqli_stmt_store_result($stmt);
						    //echo "Upload success";
							}
						 else {
								echo "Error: " . $sql . "<br>" . mysqli_error($conn);
							}

						 }

					}






 echo'





 <div id="id01" class="w3-modal">
	 <div class="w3-modal-content">
		 <header class="w3-container w3-green">
			 <span onclick="document.getElementById(\'id01\').style.display=\'none\'"
			 class="w3-button w3-display-topright">&times;</span>
			 <h2>Add Module</h2>
		 </header>
		 <div class="w3-container">
		 <form method="post">
		 <label for="fname" style="font-size: 15px;">Module Name</label>
		 <input type="text" id="Module" name="Module" placeholder="Module name.."><br>
		 <input type="submit" class="sub" value="Submit">
		 </form>
		 </div>
	 </div>
 </div>

 <div id="id02" class="w3-modal">
	<div class="w3-modal-content">
		<header class="w3-container w3-green">
			<span onclick="document.getElementById(\'id02\').style.display=\'none\'"
			class="w3-button w3-display-topright">&times;</span>
			<h2>Add Video</h2>
		</header>

		<div class="w3-container">
		<form method="post" enctype=\'multipart/form-data\'>

		<label for="video">Unit Name</label>
		<input type="text" id="video" name="video" placeholder="Unit name.."><br>
		<label for="vid">Select video</label>
    <input type="file" id="vid" name="vid" accept="video/*">

		<input type="submit" value="Submit" class="sub1">
		</form>
		</div>
	</div>
 </div>

 <div>
 ';


 $sql1 = "SELECT * FROM module WHERE  COURSE_ID= ?  ";

 if($stmt1 = mysqli_prepare($conn, $sql1))
	 mysqli_stmt_bind_param($stmt1, "s",$course_id);

	 if(mysqli_stmt_execute($stmt1))
	 {
		 $result1 = mysqli_stmt_get_result($stmt1);
		 while($row = mysqli_fetch_assoc($result1))
		 {
					if(empty($row['VIDEO_NAME'])){
						echo '<span><h3 class="hemod">'.$row['MODULE_NAME'].'</h3></span>';
					}
					else {
						echo'<span><h6 style="margin-left:10px"; >'.$row['VIDEO_NAME'].'</h6></span>';
						echo'<video width="350" height="200" controls>
					   <source src="'.$row['VIDEO_LOCATION'].'" type="video/mp4">
					   <source src="movie.ogg" type="video/ogg">
					   Your browser does not support the video tag.
					 </video>';
					}
		 }
	 }


echo'

</div>

</div>

</body>

</html>';
?>
