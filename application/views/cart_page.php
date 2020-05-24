<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/CSS/style.css">

</head>

<script type="text/javascript">
// To conform clear all data in cart.
function clear_cart() {
var result = confirm('Are you sure want to clear all bookings?');
if (result) {
window.location = "<?php echo base_url(); ?>index.php/Shopping_Cart/remove_cart/all";
    } else {
return false; // cancel button
    }
}
</script>

<body>

<div id="cart" >
<div id = "heading">
<h2 align="center">Products on Your Shopping Cart</h2>
</div>

<div>
 <table id="table" border="0" cellpadding="5px" cellspacing="1px">
<?php
// All values of cart store in "$cart".
if ($cart = $this->cart->contents()): ?>

<tr id= "main_heading">
<td>Serial</td>
<td>Name</td>
<td>Price</td>
<td>Qty</td>
<td>Amount</td>
<td>Cancel Products</td>
</tr>

<?php
// Create form and send all values in "shopping/update_cart" function.
echo form_open('Shopping_Cart/update_cart');
$grand_total = 0;
$i = 1;

foreach ($cart as $item):
echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
?>

<tr>
<td>
<?php echo $i++; ?>
</td>
<td>
<?php echo $item['name']; ?>
</td>
<td>
# <?php echo number_format($item['price'], 2); ?>
</td>
<td>
<?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
</td>
<?php $grand_total = $grand_total + $item['subtotal']; ?>
<td>
# <?php echo number_format($item['subtotal'], 2) ?>
</td>
<td>

<?php
// cancle image.
$path = "<img src='http://localhost/codeigniter_cart/images/cart_cross.jpg' width='25px' height='20px'>";
echo anchor('Shopping_Cart/remove_cart/' . $item['rowid'], $path);
?>

</td>

<?php endforeach; ?>
</tr>

<tr>
<td><b>Order Total: #<?php
//Grand Total.
echo number_format($grand_total, 2); ?></b>
</td>

<?php // "clear cart" button call javascript confirmation message ?>
<td colspan="5" align="right"><input  class ='fg-button teal' type="button" value="Clear Cart" onclick="clear_cart()">

<?php //submit button. ?>
<input class ='fg-button teal'  type="submit" value="Update Cart">
<?php echo form_close(); ?>

<!-- "Place order button" on click send "billing" controller -->
<input class ='fg-button teal' type="button" value="Place Order" onclick="window.location = 'billing_view'">
</td>
</tr>

<?php endif; ?>
</table>

</div>

</body>
</html>