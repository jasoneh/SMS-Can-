

<?php

    $width = 48;
    $height = 48;
    $nof_cols = 4;
    $nof_rows = 4;
?>

<h1>Featured products</h1>
    <? for($y=0; $y<$nof_rows; $y++): ?>
        <div class="productrow">
        <? for($x=0; $x<$nof_cols; $x++): ?>

            <div class="product-item product-item-small">
                <img src="http://smscanada.com/prodimg/Pd/FA206.jpg"
                     class="product-image-small"/>
            </div>

        <? endfor; ?>
            <div style="clear: both;"></div>
        </div>
        <div style="clear: both;"></div>
    <? endfor; ?>
    