<?php
	//Model 
	function getAllauthors() {
		include("../../inc/dbconn.php");
		
		$sql_command = 'SELECT * FROM authors';
		$result = mysqli_query($conn, $sql_command);
		$authors = array();
		while($row = mysqli_fetch_assoc($result)) {
			$authors[] = $row;
		}
		mysqli_close($conn);
		
		return $authors;
	}
?>

<?php
	//Controller
	$authors = getAllauthors();
?>

<!--View-->
<table border='1'>
		<tr>
			<td class="update"></td>
			<td class="delete"></td>
			<td class="id">ID</td>
			<td class="title">Name</td>
			<td class="author">Image</td>
			<td class="catID">Desc</td>
		</tr>
		<tr>
			<td class="update"></td>
			<td class="delete"></td>
			<td class="id"></td>
			<td class="title"><a href="insert.php">Insert</a></td>
			<td class="author"></td>
			<td class="catID"></td>
		</tr>
	<?php foreach($authors as $author) :?>
		<tr>
			<td class="update"><a href="update.php?authorID=<?php echo $author["authorID"] ?>">Update</td>
			<td class="delete"><a href="delete.php?authorID=<?php echo $author["authorID"] ?>">Delete</td>
			<td class="id"><?php echo $author["authorID"]; ?> </td>
			<td class="title"><a href="authorDetails.php?ID=<?php echo $author["authorID"] ?>"><?php echo $author["authorName"]; ?></a></td>
			<td class="author"><?php echo $author["authorImage"]; ?> </td>
			<td class="catID" style="max-width: 200px"><?php echo substr($author["authorDescription"], 0, 60). "..."; ?> </td>
		</tr>
	<?php endforeach ?>
</table>