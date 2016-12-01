<?php include 'view/header.php'; ?>
<?php include 'view/sidebar_admin.php'; ?>
<main>
    <h1>Orders to be Shipped</h1>
    <?php if (count($new_orders) > 0 ) : ?>
    <table>
        <tr>
            <th>Order</th>
            <th>Customer</th>
            <th>Order Date</th>
            <th></th>
        </tr>
        
            <?php foreach($new_orders as $order) :
                $order_id = $order['orderID'];
                $order_date = strtotime($order['orderDate']);
                $order_date = date('M j, Y', $order_date);
                $url = $app_path . 'admin/orders' .
                       '?action=view_order&amp;order_id=' . $order_id;
                ?>
        <tr>
                <td>
                    Order # 
                    <?php echo $order_id; ?>
                </td>
                <td>
                    <?php echo $order['firstName'] . ' ' .
                               $order['lastName']; ?>
                </td>
                <td>
                    <?php echo $order_date; ?>
                </td>
        
                <td>
                    <form action="." method="post" >
            <input type="hidden" name="action" value="set_ship_date">
            <input type="hidden" name="order_id"
                   value="<?php echo $order_id; ?>">
            <input type="submit" value="Ship Order">
        </form>
                </td>
        </tr>
            <?php endforeach; ?>
    
    </table>
    <?php else: ?>
        <p>There are no shipped orders.</p>
    <?php endif; ?>
    
</main>
<?php include 'view/footer.php'; ?>