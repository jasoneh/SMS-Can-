<h2>SMSCanada first page</h2>


<pre>

Editing this Page

To change the content of this page, create: APP/View/Pages/home.ctp.
To change its layout, create: APP/View/Layouts/default.ctp.
You can also add some CSS styles for your pages at: APP/webroot/css.
</pre>

<div id="featured">
    <h4>Featured products</h4>
    <ul class="featured-grid">
        <? for($i=0; $i<4; $i++): ?>
            <li class="item">
                <p> PRODUCT IMAGE </p>
                <p>Short description</p>
                <p>Add to cart</p>
            </li>
        <? endfor; ?>
        <div class="clear"></div>
    </ul>

</div>