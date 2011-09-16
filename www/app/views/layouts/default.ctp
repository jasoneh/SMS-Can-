<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
        "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<title>SMSCanada</title>
    
<?php
	echo $html->meta('icon');

	#echo $html->css('main');
	echo $html->css('960grid');
	echo $html->css('style');
	echo $html->css('formalize');
	
	echo $scripts_for_layout;
?>
</head>
<body>

        <div id="top-row">
            <div class="navleft">
                <h1>SMS Canada</h1>
            </div>
            <div class="navmenu navright">
                <ul>
                    <li>Login</li>
                </ul>
            </div>

            <div class='clear'>&nbsp;</div>
        </div>


		<div class="container container_12">

			<div class="grid_12 header-menu">
                <!-- English and French menu items based on language selection -->
                <div class="navmenu navleft">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="/products/list">Products</a></li>
                        <li><a href="#">Parts charts</a></li>
                        <li><a href="/about/">About</a></li>
                        <li><a href="/about/contact/">Contact</a></li>
                    </ul>
                </div>

                <div class="navmenu navright">
                    <ul>
                        <form method="GET" action="#">
                        <li><input type="text" id="search-query" name="search-query"></li>
                        <li><input type="submit" id="search-submit" value="Search"/></li>
                        </form>

                    </ul>
                </div>

                <div class='clear'>&nbsp;</div>

			</div>

			<div class='clear'>&nbsp;</div>
            
			<div class='grid_3'>
				<p>grid 3</p>
			</div>

			<div class='grid_9'>
				<p>grid 4</p>
			</div>
			<div class='clear'>&nbsp;</div>
			
            <!-- footer -->
            <div class="grid_12 footer">
				<a href="#">About</a> |
                <a href="#">Contact</a> |
                <a href="#">Legal</a>
			</div>
            <div class="clear">&nbsp;</div>

		</div>
	</body>

</html>