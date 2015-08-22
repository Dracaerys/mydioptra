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
            <label for="firstname">firstname</label><input type="text" id="firstname" name="firstname"  value="<?php if (isset($item)) echo $item['firstname'] ?>" />
        <br class="clear" /> 
            <label for="lastname">lastname</label><input type="text" id="lastname" name="lastname"  value="<?php if (isset($item)) echo $item['lastname'] ?>" />
        <br class="clear" /> 
            <label for="email">email</label><input type="text" id="email" name="email"  value="<?php if (isset($item)) echo $item['email'] ?>" />
        <br class="clear" /> 
            <label for="password">password</label><input type="text" id="password" name="password"  value="<?php if (isset($item)) echo $item['password'] ?>" />
        <br class="clear" /> 
            <label for="status">status</label><input type="text" id="status" name="status"  value="<?php if (isset($item)) echo $item['status'] ?>" />
        <br class="clear" /> 
        <label for="submit"></label><input type="submit" name="submit" id="submit" value="<?php echo $form_title ?>" />
     &nbsp;&nbsp;&nbsp;<a href="list.php">Cancel</a>
    <br class="clear" /> 
</form>