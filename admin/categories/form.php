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
<h2><?php echo $form_title ?></h2>
<form id="form1" name="form1" method="post" action="">
            <label for="catParent">catParent</label><input type="text" id="catParent" name="catParent"  value="<?php if (isset($item)) echo $item['catParent'] ?>" />
        <br class="clear" /> 
            <label for="catName">catName</label><input type="text" id="catName" name="catName"  value="<?php if (isset($item)) echo $item['catName'] ?>" />
        <br class="clear" /> 
            <label for="catDescription">catDescription</label><input type="text" id="catDescription" name="catDescription"  value="<?php if (isset($item)) echo $item['catDescription'] ?>" />
        <br class="clear" /> 
        <label for="submit"></label><input type="submit" name="submit" id="submit" value="<?php echo $form_title ?>" />
     &nbsp;&nbsp;&nbsp;<a href="list.php">Cancel</a>
    <br class="clear" /> 
</form>