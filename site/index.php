<?php
include("/wamp64/www/site/include/header.php");
?>
<main>
    <!-- <button id="topButton" onclick="topButton()" title="Yukarı Çık">
        <i class="fa-solid fa-arrow-up-to-line"></i>
    </button> -->
    <?php
    $git = @$_GET["git"];
    switch ($git) {
        case 'about':
            include("/wamp64/www/site/pages/about.php");
            break;
        case 'references':
            include("/wamp64/www/site/pages/references.php");
            break;
        case 'products':
            include("/wamp64/www/site/pages/products.php");
            break;
        case 'contact':
            include("/wamp64/www/site/pages/contact.php");
            break;
        default:
            include("/wamp64/www/site/pages/landing.php");
            break;
    }
    ?>
</main>
<?php
include("/wamp64/www/site/include/footer.php");
?>