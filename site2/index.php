<?php
require "/wamp64/www/site2/pages/connectionDb.php";
include("/wamp64/www/site2/include/header.php");

$git = @$_GET["git"];
switch ($git) {
  case 'blog':
    include("/wamp64/www/site2/pages/blog.php");
    break;
  case 'about':
    include("/wamp64/www/site2/pages/about.php");
    break;
  case 'contact':
    include("/wamp64/www/site2/pages/contact.php");
    break;
  case 'admin':
    include("/wamp64/www/site2/pages/admin.php");
    break;
  case 'write':
    include("/wamp64/www/site2/pages/write.php");
    break;
  case 'post':
    include("/wamp64/www/site2/pages/post.php");
    break;
  default:
    include("/wamp64/www/site2/pages/landing.php");
    break;
}

include("/wamp64/www/site2/include/footer.php");
