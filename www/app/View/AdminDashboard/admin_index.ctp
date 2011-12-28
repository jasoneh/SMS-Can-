<div class="container-grid">
    <div class="column span-12">


        <div class="module" id="app_content">
            <h2><a href="" class="section">Content</a></h2>

                <div class="row">
                    <? echo $this->Html->link('Products', array('controller' => 'products', 'action' => 'admin_index' ) ); ?>
                    <ul class="actions">
                        <li class="add-link">
                            <? echo $this->Html->link('Add', array('controller' => 'products', 'action' => 'admin_add' ) ); ?>
                        </li>
                        <li class="change-link"> <a href="#">Change</a></li>
                    </ul>
               </div>

                <div class="row">
                    <? echo $this->Html->link('Categories', array('controller' => 'categories', 'action' => 'admin_index' ) ); ?>

                    <ul class="actions">
                        <li class="add-link"><a href="auth/user/add/">Add</a></li>
                        <li class="change-link"> <a href="auth/user/">Change</a></li>
                    </ul>
               </div>
                <div class="row">
                    <a href="auth/user/">Manufacturers</a>
                    <ul class="actions">
                        <li class="add-link"><a href="auth/user/add/">Add</a></li>
                        <li class="change-link"> <a href="auth/user/">Change</a></li>
                    </ul>
               </div>

       </div>

        <div class="module" id="app_dealers">
            <h2><a href="sites/" class="section">Dealers</a></h2>

                <div class="row">
                    <? echo $this->Html->link('Accounts', array('controller' => 'dealers', 'action' => 'admin_index'));  ?>
                    <ul class="actions">
                        <li class="add-link"><a href="sites/site/add/">Add</a></li>
                        <li class="change-link"> <a href="sites/site/">Change</a></li>
                    </ul>
               </div>
                <div class="row">
                    <a href="sites/site/">Orders</a>
                    <ul class="actions">
                        <li class="add-link"><a href="sites/site/add/">Add</a></li>
                        <li class="change-link"> <a href="sites/site/">Change</a></li>
                    </ul>
               </div>
       </div>

        <div class="module" id="app_orders">
            <h2><a href="sites/" class="section">Orders</a></h2>

                <div class="row">
                    <a href="sites/site/">Carts</a>
                    <ul class="actions">
                        <li class="add-link"><a href="sites/site/add/">Add</a></li>
                        <li class="change-link"> <a href="sites/site/">Change</a></li>
                    </ul>
               </div>
       </div>
    </div>
    
</div>