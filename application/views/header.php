
<header id = "header"> 
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class style="float:right">
<a href="index" class="navbar-brand">
<h3 class = "px-5">Continue Shopping <i class = "fas fa-shopping-basket"></i>
</h3>
</a>
</div>
</nav>


<div class = "collapsexxxx navbar" id="navbarNavAltMarkup">
<div class style="float:right"></div>
<div class= "navbar-nav">
<a href="cart.php" class="nav-item nav-link active">
<h5 calss = "px-5 cart">
<i class= "fas fa-shopping-cart"></i>Cart

<?php
if ($cart = $this->cart->contents()){
    $count = count($cart);
    echo $count;
}else {
    echo "cart is empty";
}
?>

</h5>
</a>
</div>
</div>

</header>
