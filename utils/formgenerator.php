<?php
$ddl_str = " 	CREATE TABLE `users` (
 `userID` int(11) NOT NULL AUTO_INCREMENT,
 `firstname` varchar(40) NOT NULL,
 `lastname` varchar(40) NOT NULL,
 `email` varchar(40) NOT NULL,
 `password` varchar(40) NOT NULL,
 `status` varchar(5) NOT NULL DEFAULT 'user',
 PRIMARY KEY (`userID`),
 UNIQUE KEY `username` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8";

$ddl_str = str_replace('6,2', '', $ddl_str);
$arr = explode(',', $ddl_str);


//print_r($arr);

foreach ($arr as $value) {
    $str = trim($value);
    $str = str_replace('CREATE TABLE ', '', $str);
    $str2 = explode("`", $str);
    $str3[] = $str2[1];
    //print_r($str3) . '<br><br>';
}
array_shift($str3);
array_pop($str3);
//print_r($str3) . '<br><br>';
?>
Instructions : View page source and copy from mark.
<!---- copy from here until the end---->
<style>
    form label {
        float: left;
        width: 150px;
        margin-bottom: 5px;
        margin-top: 5px;
    }
    .clear {
        display: block;
        clear: both;
        width: 100%;
    }
</style>
<h2>?php echo $form_title ?></h2>
<form id="form1" name="form1" method="post" action="">
    <?php foreach ($str3 as $v) { ?>
        <label for="<?php echo $v ?>"><?php echo $v ?></label><input type="text" id="<?php echo $v ?>" name="<?php echo $v ?>"  value="?php if (isset($item)) echo $item['<?php echo $v ?>'] ?>" />
        <br class="clear" /> 
    <?php } ?>
    <label for="submit"></label><input type="submit" name="submit" id="submit" value="?php echo $form_title ?>" />
     &nbsp;&nbsp;&nbsp;<a href="list.php">Cancel</a>
    <br class="clear" /> 
</form>