<style>
    form {
        border: 2px solid black;
            padding: 20px;
            width: 40%
    }
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
    <label for="authorName">Authorname</label><input type="text" name="authorName" id="authorName" value="<?php if (isset($item)) echo $item['authorName'] ?>" />
    <br class="clear" /> 
    <label for="slug">Slug</label><input type="text" name="slug" id="slug" value="<?php if (isset($item)) echo $item['slug'] ?>" />
    <br class="clear" /> 
    <label for="authorImage">Authorimage</label><input type="text" name="authorImage" id="authorImage" value="<?php if (isset($item)) echo $item['authorImage'] ?>"/>
    <br class="clear" /> 
    <label for="authorDescription">Authordescription</label><input type="text" name="authorDescription" id="authorDescription" value="<?php if (isset($item)) echo $item['authorDescription'] ?>"/>
    <br class="clear" /> 
    <label for="submit"></label><input type="submit" name="submit" id="submit" value="<?php echo $form_title ?>" />
    &nbsp;&nbsp;&nbsp;<a href="list.php">Cancel</a>
    <br class="clear" /> 
    </form>