<a title="Home" href="/mydioptra" class="Logo" >
    <span class="LogoRight"></span>
    <span class="LogoTop"></span>
    <span class="LogoBottom"></span>
</a>
<div id="topmenu">
    <ul>
        <?php
        session_start();
        //display link depending on staus
        if (!isset($_SESSION['loginStatus'])) {
            echo '<li><a href="account.php">Είσοδος | Εγγραφή</a></li>';
        } else {
            echo '<li><a href="account.php">Ο λογαριασμός μου</a></li>';
            echo '<li><a href="inc/logout.php">Αποσύνδεση</a></li>';
        }
        ?>
        <li><a href="#">Κατάσταση Παραγγελίας</a></li>
        <li><a href="wishlist.php">Wishlist</a></li>
        <li><a href="#">Βοήθεια</a></li>
    </ul>
</div>

<div class="SocialMediaButtons">
    <ul>
        <li class="Facebook"><a title="Facebook" target="_blank" href="https://www.facebook.com/dioptrapublishing"></a></li>
        <li class="Pinterest"><a title="Pinterest" target="_blank" href="http://pinterest.com/dioptrabooks/"></a></li>
        <li class="Twitter"><a title="Twitter" target="_blank" href="https://twitter.com/DioptraBooks"></a></li>
        <li class="Youtube"><a title="Youtube" target="_blank" href="http://www.youtube.com/user/dioptrapublishing"></a></li>
        <li class="GooglePlus"><a title="Google+" target="_blank" href="https://plus.google.com/+%CE%B4%CE%B9%CE%BF%CF%80%CF%84%CF%81%CE%B1"></a></li>
        <li class="Apple"><a title="Apple" target="_blank" href="http://ax.search.itunes.apple.com/WebObjects/MZSearch.woa/wa/search?entity=ebook&media=all&page=1&restrict=true&startIndex=0&term=%CE%B5%CE%BA%CE%B4%CF%8C%CF%83%CE%B5%CE%B9%CF%82+%CE%B4%CE%B9%CF%8C%CF%80%CF%84%CF%81%CE%B1"></a></li>
    </ul>
</div> 
