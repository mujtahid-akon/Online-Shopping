<?php
function cart_viewer($cart, $total)
{
    echo <<<EOF
<div class="cart" id="cart">
    <h2>Shoping Cart</h2>
EOF;
    foreach ($cart as $item):
        $price = anchor("database_controller/remove/{$item['rowid']}",'X');
        echo <<<EOF
<div class="cart_item">
    <div class="item_name">{$item['name']}</div>
    <div class="item_subtotal">{$item['subtotal']}</div>
    <div class="item_remove">{$price}</div>
</div>
EOF;

    endforeach;
    echo <<<EOF
<div class="total">
    <label class="sum_label">Total</label> <div class="sum">{$total}</div>
</div>
<div class="order_button">
    <a href="http://localhost/ci/index.php/database_controller/order" >Order</a>
</div>
</div>
EOF;
}