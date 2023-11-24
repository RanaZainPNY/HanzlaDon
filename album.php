<?php
/**
* 	Showing all photos in DB
*
*	@author Swinburne University of Technology
*/
ini_set('display_errors', 1);
require 'mydb.php';
require_once 'constants.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="defaultstyle.css">
		<title>Photo Album</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">
		
		<style>
			body{
				padding: 15px;
				font-family: Arial;
			}
		</style>
		
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap5.min.js"></script>
		
		<script>
			$(document).ready(function() {
				new DataTable('#example', {
					responsive: true
				});
			} );
		</script>
	</head>
	<body>
		<h4>Student name: <?php echo STUDENT_NAME; ?></h4>
		<h4>Student ID: <?php echo STUDENT_ID; ?></h4>
		<h4>Tutorial session: <?php echo TUTORIAL_SESSION; ?></h4><br/>
		
		<h3><strong>Uploaded photos:</strong></h3>
		<table id="myTable" class="table table-bordered table-striped table-hover" border = "1">
		  <tr class="table-primary">
			<th>Photo</th>
			<th>Name</th>
			<th>Description</th>
			<th>Creation date</th>
			<th>Keywords</th>
		  </tr>
		<?php 
		$my_db = new MyDB();
		$photos = $my_db->getAllPhotos();
		foreach ($photos as $photo) {
			echo "<tr><td><img class = 'photo_cell' src='".$photo->getS3Reference()."' /></td><td>".$photo->getName()."<td>".$photo->getDescription()."</td><td>".$photo->getCreationDate()."</td><td>".$photo->getKeywords()."</td></tr>";
		}
		?>
		</table>
	</body>
</html>