<?php
	//Model 
	function getAllbooks() {
		include("../../inc/dbconn.php");
		
		$sql_command = 'SELECT * FROM books';
		$result = mysqli_query($conn, $sql_command);
		$books = array();
		while($row = mysqli_fetch_assoc($result)) {
			$books[] = $row;
		}
		mysqli_close($conn);
		
		return $books;
	}
?>

<?php
	//Controller
	$books = getAllbooks();
?>

<!--View-->
<table border='1'>
		<tr>
			<td class="update"></td>
			<td class="delete"></td>
			<td class="id">ID</td>
			<td class="title">Name</td>
			<td class="book">Image</td>
			<td class="catID">Category</td>
		</tr>
		<tr>
			<td class="update"></td>
			<td class="delete"></td>
			<td class="id"></td>
			<td class="title"><a href="insert.php">Insert</a></td>
			<td class="book"></td>
			<td class="catID"></td>
		</tr>
	<?php foreach($books as $book) :?>
		<tr>
			<td class="update"><a href="update.php?bookID=<?php echo $book["bookID"] ?>">Update</td>
			<td class="delete"><a href="delete.php?bookID=<?php echo $book["bookID"] ?>">Delete</td>
			<td class="id"><?php echo $book["bookID"]; ?> </td>
			<td class="title"><a href="bookDetails.php?ID=<?php echo $book["bookID"] ?>"><?php echo $book["Title"]; ?></a></td>
			<td class="book"><?php echo $book["Image"]; ?> </td>
			<td class="catID"><?php echo $book["catID"]; ?> </td>
			
			
		</tr>
	<?php endforeach ?>
</table>