<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/CSS/style.css">

</head>

<body>

<div id="cart" >
<div id = "heading">
<h2 align="center">Billing Information</h2>
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
</tr>

<?php
// Create form and send all values in "shopping/update_cart" function.
echo form_open('Shopping_Cart/update_cart');
$grand_total = 0;
$i = 1;

foreach ($cart as $item):
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

</td>

<?php endforeach; ?>
</tr>

<?php endif; ?>
</table>

</div>

<div>

<b>Order Total: #<?php
echo number_format($grand_total, 2); ?></b>

    <input class ='fg-button teal' type="button" value="Make Payment" onclick="window.location = 'place_order'">

</div>
</body>
</html>