
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>960 Grid System &mdash; Demo</title>
<?php
    echo $html->css('960/reset');
    echo $html->css('960/text');
    echo $html->css('960/960');
    echo $html->css('960/demo');
    
    echo $html->css('style');
    echo $html->css('formalize');
?>

</head>
<body>

<header>
    <nav>
        <div class="container_12">
            <ul class="clearfix">
                <li class="nav-home"><a href="/">Home</a> </li>
                <li class="nav-last">Login</li>
                <li><a href="#">ordinary</a></li>
            </ul>
        </div>
    </nav>
</header>

<div class="container_12">
    <div class="grid_12">
        <p>
          SMSCanada -header 940
        </p>
    </div>
    <!-- end .grid_12 -->
    <div class="clear"></div>
    <div class="grid_7">
        <ul class="navmenu">
            <li><b>SMSCanada</b></li>
            <li><a href="#">Products</a></li>
            <li><a href="#">Parts charts</a></li>
        </ul>
    </div>
    <div class="grid_5">
        <p>
            SMSCanada -header 380
        </p>
    </div>
    <!-- end .grid_5 -->

    <div class="clear"></div>
    <div class="grid_3">
        <p>
            220 sidebar categories
      </p>
    </div>
    <!-- end .grid_3 -->
    <div class="grid_9">
        <p>
            700 - main content
        </p>
    </div>
    <!-- end .grid_9 -->

    <div class="grid_12">
        <p>
          SMSCanada -footer 940
        </p>
  </div>
  <!-- end .grid_12 -->
</div>
<!-- end .container_16 -->
</body>
</html>