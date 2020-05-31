<html>
<head>
<title>Codeigniter cart class</title>
<link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700' rel='stylesheet' type='text/css'>

<!-- Font Awesome CDN-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.css" integrity="sha256-2SjB4U+w1reKQrhbbJOiQFARkAXA5CGoyk559PJeG58=" crossorigin="anonymous" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/CSS/style.css">

</head>
<body>

<div id='content'>

<div id="text">
<?php $cart_check = $this->cart->contents();
if(empty($cart_check)) {
echo 'To add products to your shopping cart click on "Add to Cart" Button';
} ?>
 </div>

<div id="products" align="center">

<h2 id="head" align="center">Products</h2>


<?php
// "$products" send from "shopping" controller,its stores all product which available in database.
foreach ($products as $product) {
$id = $product->id;
$name = $product->name;
$description = $product->description;
$price = $product->price;
$images = $product->images;

echo "<div id='product_div'>";

echo "<div id='info_product'>
<div id='image_div'><img src='".base_url().$images." '/ width=200 height=200></div>
<div id='name'>".$name."</div>
<div id='desc'>".$description."</div>
<div id='rs'><b>Price</b>:<big>".$price."</big></div>";

// Create form and send values in 'Shopping_Cart/add' function.
echo form_open('Shopping_Cart/add_cart');
echo form_hidden('id', $id);
echo form_hidden('name', $name);
echo form_hidden('price', $price);
echo form_hidden('image', $images);
 echo"</div>";
echo "<div id='add_button'>";
$btn = array(
'class' => 'fg-button teal',
'value' => 'Add to Cart',
'name' => 'action',
);

// Submit Button.
echo form_submit($btn);
echo form_close();
echo "</div></div>";
 } 
 ?>
 
</div>
</div>
</body>
</html>