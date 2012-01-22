<?php
    /**
     * Display name for the toggle language link in the head menu
     */
    $lang = $this->Session->read('lang');
    if($lang == 'en'){
        $next_language = 'french';
    }else{
        $next_language = 'english';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>SMS Canada &mdash;<?php echo $title_for_layout ?> </title>
<?php
    echo $this->Html->script('jquery.min');
    echo $this->Html->script('jquery.formalize');
    echo $this->Html->css('960/reset');
    echo $this->Html->css('960/text');
    echo $this->Html->css('960/960');
    echo $this->Html->css('960/demo');

    echo $this->Html->css('style');
    echo $this->Html->css('formalize');
    echo $this->Html->css('buttons');
?>


</head>
<body>

<header>
    <nav>
        <div class="container_12">
            <ul class="clearfix">
                <li class="nav-home"><a href="/"><span class="olive">SMS</span><span class="grey">Canada</span></a>
                </li>
                <!--<li class="nav-last"><span class="olive">Login</span> </li>-->
                <?php echo $this->element('login_logout'); ?>
                <li><?php echo $this->Html->link($next_language, '/languages/toggle'); ?></li>
                <li><?php echo $this->Html->link(__('Contact'), array('controller' => 'contact', ) ); ?></li>
                <li><a href="#">dealers</a></li>
                <li><a href="#">parts charts</a></li>
                <li><a href="/smscanada/index.php/products">Products</a></li>
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
            <p>SMSCanada - header 380</p>
            <p>lang: <?php echo $this->Session->read('lang'); ?></p>
        </div>
        <!-- end .grid_5 -->

        <div class="clear"></div>
        <div class="grid_3">
            <p>
                <?php echo $this->element('cart'); ?>
                220 sidebar categories
                <?php echo $this->element('categories'); ?>
          </p>
        </div>
        <!-- end .grid_3 -->
        <div class="grid_9">
            <p>
                <?php #$session->flash(); ?>
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

