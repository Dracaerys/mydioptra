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
            <label for="authorID">authorID</label><input type="text" id="authorID" name="authorID"  value="<?php if (isset($item)) echo $item['authorID'] ?>" />
        <br class="clear" /> 
            <label for="catID">catID</label><input type="text" id="catID" name="catID"  value="<?php if (isset($item)) echo $item['catID'] ?>" />
        <br class="clear" /> 
            <label for="Title">Title</label><input type="text" id="Title" name="Title"  value="<?php if (isset($item)) echo $item['Title'] ?>" />
        <br class="clear" /> 
            <label for="slug">slug</label><input type="text" id="slug" name="slug"  value="<?php if (isset($item)) echo $item['slug'] ?>" />
        <br class="clear" /> 
            <label for="shortDescription">shortDescription</label><input type="text" id="shortDescription" name="shortDescription"  value="<?php if (isset($item)) echo $item['shortDescription'] ?>" />
        <br class="clear" /> 
            <label for="longDescription">longDescription</label><input type="text" id="longDescription" name="longDescription"  value="<?php if (isset($item)) echo $item['longDescription'] ?>" />
        <br class="clear" /> 
            <label for="pubDate">pubDate</label><input type="text" id="pubDate" name="pubDate"  value="<?php if (isset($item)) echo $item['pubDate'] ?>" />
        <br class="clear" /> 
            <label for="Image">Image</label><input type="text" id="Image" name="Image"  value="<?php if (isset($item)) echo $item['Image'] ?>" />
        <br class="clear" /> 
            <label for="thumbnail">thumbnail</label><input type="text" id="thumbnail" name="thumbnail"  value="<?php if (isset($item)) echo $item['thumbnail'] ?>" />
        <br class="clear" /> 
            <label for="price">price</label><input type="text" id="price" name="price"  value="<?php if (isset($item)) echo $item['price'] ?>" />
        <br class="clear" /> 
            <label for="hasEbook">hasEbook</label><input type="text" id="hasEbook" name="hasEbook"  value="<?php if (isset($item)) echo $item['hasEbook'] ?>" />
        <br class="clear" /> 
            <label for="ebookPrice">ebookPrice</label><input type="text" id="ebookPrice" name="ebookPrice"  value="<?php if (isset($item)) echo $item['ebookPrice'] ?>" />
        <br class="clear" /> 
            <label for="theme">theme</label><input type="text" id="theme" name="theme"  value="<?php if (isset($item)) echo $item['theme'] ?>" />
        <br class="clear" /> 
        <label for="submit"></label><input type="submit" name="submit" id="submit" value="<?php echo $form_title ?>" />
     &nbsp;&nbsp;&nbsp;<a href="list.php">Cancel</a>
    <br class="clear" /> 
</form>