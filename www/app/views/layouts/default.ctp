
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>SMS Canada &mdash; </title>
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
                <li class="nav-home"><a href="/"><span class="olive">SMS</span><span class="grey">Canada</span></a>
                </li>
                <li class="nav-last"><span class="olive">Login</span> </li>
                <li><a href="#">products</a></li>
                <li><a href="#">parts charts</a></li>
                <li><a href="#">dealers</a></li>
                <li><a href="#">contact</a></li>
            </ul>
        </div>
    </nav>
</header>

<section id="mainsection">
    
    <div class="container_12 main box_shadow">
        <div class="grid_12">
            <p>
              SMSCanada -header 940
            </p>
        </div>
        <!-- end .grid_12 -->
        <div class="clear"></div>
        <div class="grid_7">
            grid_7
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
                <?php echo $this->renderElement('categories'); ?>
          </p>
        </div>
        <!-- end .grid_3 -->
        <div class="grid_9">
            <p>
                <?php $session->flash(); ?>
                700 - main content
                <div id="content">
                    <?php echo $content_for_layout; ?>
                </div>
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

</section>

</body>
</html>