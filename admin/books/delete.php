<?php 
	print_r($_POST);
	
	function updateOneAuthor($ID) {
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
		$sql_command = "DELETE FROM authors WHERE authorID = $ID";
		echo $sql_command;
		mysqli_query($conn, $sql_command);
		
		
		mysqli_close($conn);
		
	}
	
	if (isset($_POST['submit'])) {
		$ID = $_GET["authorID"];
		updateOneAuthor($ID);
		header('Location: list.php');
	}
?>

<?php 
	function getAuthor($ID) {
		include("../inc/dbconn.php");
		
		$sql_command = 'SELECT * FROM authors WHERE authorID=' . $ID;
		$result = mysqli_query($conn, $sql_command);
		$author = array();
		while($row = mysqli_fetch_assoc($result)) {
			$author[] = $row;
		}
		mysqli_close($conn);
		
		$author = $author[0];
		
		return $author;
	}
	
	$author = getAuthor($_GET["authorID"]);
?>
<form action="delete.php?authorID=<?php echo $_GET["authorID"]; ?>" method="POST">
	Name
	<input name="authorName" value="<?php echo $author["authorName"]; ?>">
	<br>
	Image
	<input name="authorImage" value="<?php echo $author["authorImage"]; ?>">
	<br>
	Description
	<input width="400" name="authorDescription" value="<?php echo $author["authorDescription"]; ?>">
	<br>
	<input type="submit" name="submit" value="Delete">
</form>