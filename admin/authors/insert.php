<?php 
	print_r($_POST);
	
	function insertOneAuthor() {
		include("../../inc/dbconn.php");
		$authorName = $_POST['authorName'];
		$authorImage = $_POST['authorImage'];
		$authorDescription = $_POST['authorDescription'];
		echo('function called');
		if ($authorName == '') {
			echo "Author Name is required";
			exit;
		}
		if ($authorImage == '') {
			$authorImage = 'default.jpg';
		}
		$sql_command = "INSERT INTO authors (authorID, authorName, authorImage, authorDescription) VALUES (NULL, '$authorName', '$authorImage', '$authorDescription')";
		echo $sql_command;
		mysqli_query($conn, $sql_command);
		
		
		mysqli_close($conn);
		
	}
	
	if (isset($_POST['submit'])) {
		insertOneAuthor();
		header('Location: list.php');
	}
?>

<form action="insert.php" method="POST">
	Name
	<input name="authorName">
	<br>
	Image
	<input name="authorImage" value="default.jpg">
	<br>
	Description
	<input name="authorDescription">
	<br>
	<input type="submit" name="submit">
</form>