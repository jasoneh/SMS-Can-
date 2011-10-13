

<?php

    $width = 48;
    $height = 48;
    $nof_cols = 3;
    $nof_rows = 4;
?>

<h1>Featured products</h1>
    <? for($y=0; $y<$nof_rows; $y++): ?>

        <? for($x=0; $x<$nof_cols; $x++): ?>

            <div class="product-item product-item-small">
                <img src="http://smscanada.com/prodimg/Pd/FA206.jpg"
                     class="product-image-small"/>
                <h4>Product Wipoeki</h4>
                <p class="border">A most exquisite product. You will help the world forward by purchasing this particular product</p>
            </div>

        <? endfor; ?>
            <div style="clear: both;"></div>
        
        <div style="clear: both;"></div>
    <? endfor; ?>
    