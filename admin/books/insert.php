<?php   
        header('Content-Type: text/html; charset=utf-8');
	//print_r($_POST);
	
        include_once("../../inc/dbconn.php");
	
        $conn = open_database_connection();
	$sql_command2 = 'SELECT * FROM authors';
	$result = mysqli_query($conn, $sql_command2);
	$authors = array();
	while($row = mysqli_fetch_assoc($result)) {
		$authors[] = $row;
	}
	
	$sql_command3 = 'SELECT * FROM categories';
	$result = mysqli_query($conn, $sql_command3);
	$categories = array();
	while($row = mysqli_fetch_assoc($result)) {
		$categories[] = $row;
	}
	
	function insertOnebook() {
		include("../../inc/dbconn.php");
		$bookName = $_POST['bookName'];
		$Image = $_POST['Image'];
		$bookDescription = $_POST['bookDescription'];
		echo('function called');
		if ($bookName == '') {
			echo "book Name is required";
			exit;
		}
		if ($Image == '') {
			$Image = 'default.jpg';
		}
		$sql_command = "INSERT INTO books (bookID, Title, Image) VALUES (NULL, '$bookName', '$Image')";
		mysqli_query($conn, $sql_command);
		
		
		
		mysqli_close($conn);
		
	}
	
	if (isset($_POST['submit'])) {
		insertOnebook();
		header('Location: list.php');
	}
?>

<form action="insert.php" method="POST">
	Name
	<input name="bookName">
	<br>
	Image
	<input name="Image" value="default.jpg">
	<br>
	Author
	<select>
		<?php foreach($authors as $author) : ?>
		<option value="<?php echo $author["authorID"] ?>"><?php echo $author["authorName"] ?></option>
		<?php endforeach ?>
	</select>
	<br>
	Category
	<select>
		<?php foreach($categories as $category) : ?>
		<option value="<?php echo $category["catID"] ?>"><?php echo $category["catName"] ?></option>
		<?php endforeach ?>
	</select>
	<br>
	Description
	<input name="bookDescription">
	<br>
	<input type="submit" name="submit">
</form>