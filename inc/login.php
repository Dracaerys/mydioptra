<?php
/////Model/////
include_once 'dbconn.php';

function login() {

    $conn = open_database_connection();
	
	$username = 'admin'; //$_POST['username'];
	$password = 'test';//$_POST['password'];
	
    // Query the table
    $sql_command = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql_command) or die(mysqli_error($conn));
	
	$check = mysqli_num_rows($result);
	if ($check == 1) {
		echo "Logged In";
		session_start();
		$_SESSION["username"] = $username;
		$_SESSION["password"] = $password;	
	} elseif ($check == 0) {
		echo "No such user found";
	} else {
		echo "Hacker Detected";
	}
	
    close_database_connection($conn);

	echo $_SESSION["username"];
}
?>


<?php
//////Controller/////
$booksByCat = login();
?>


<!-----View----->
<?php $counter=0; ?>
 <?php foreach ($booksByCat as $book) { ?>
<div class="Productlist">
    <div><a title="<?php echo $book['Title'];?>" href="bookDetails.php?ID=<?php echo $book["bookID"] ?>"><img src="<?php echo $book["thumbnail"] ?>" alt="<?php echo $book["Title"] ?>"></a></div>
    <div><a title="<?php echo $book['Title'];?>" href="bookDetails.php?ID=<?php echo $book["bookID"] ?>"><?php echo $book["Title"] ?></a></div>
    <div><a style="color: crimson"title="<?php echo $book['authorName'] ?>" href="authorDetails.php?authorID=<?php echo $book['authorID'] ?>"><?php echo $book['authorName'] ?></a></div>
    <div><?php echo substr($book['shortDescription'], 0, 70) . '...';?></div>
    <div>&nbsp</div>

</div>
<?php
$counter++;
if ($counter % 5 ==0) {
    echo '<br class="clearfloat">';
}
         } ?>
