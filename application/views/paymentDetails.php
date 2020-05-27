<html>
<head>
<title>Codeigniter cart class</title>
<link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700' rel='stylesheet' type='text/css'>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>public/CSS/style.css">

</head>

<body>
<div id="bill_info">

<?php // Create form for entering  user imformation and send values 'Shopping_Cart/save_order' function?>

<form name="billing" method="post" action="<?php echo base_url() . 'index.php/Shopping_Cart/billing_success' ?>" >
<input type="hidden" name="command" />
<div align="center">
<h1 align="center">Payment Info</h1>
<table border="0" cellpadding="2px">
<tr><td>Your Full Name:</td><td><input type="text" name="fullname" required></td></tr>
<tr><td>Bank Name:</td>
<td>
<select type="text" class="form-control " name="bank" required>
<option selected>Choose</option>
<option value="access">Access Bank</option>
<option value="citibank">Citibank</option>
<option value="diamond">Diamond Bank</option>
<option value="ecobank">Ecobank</option>
<option value="fidelity">Fidelity Bank</option>
<option value="fcmb">First City Monument Bank (FCMB)</option>
<option value="fsdh">FSDH Merchant Bank</option>
<option value="gtb">Guarantee Trust Bank (GTB)</option>
<option value="heritage">Heritage Bank</option>
<option value="Keystone">Keystone Bank</option>
<option value="rand">Rand Merchant Bank</option>
<option value="skye">Skye Bank</option>
<option value="stanbic">Stanbic IBTC Bank</option>
<option value="standard">Standard Chartered Bank</option>
<option value="sterling">Sterling Bank</option>
<option value="suntrust">Suntrust Bank</option>
<option value="union">Union Bank</option>
<option value="uba">United Bank for Africa (UBA)</option>
<option value="unity">Unity Bank</option>
<option value="wema">Wema Bank</option>
<option value="zenith">Zenith Bank</option>
</select>
</div>
</td>
</tr>

<tr><td>Method Of Payment:</td>
<td>
<select type="text" class="form-control" name="payment_mode" required>
<option selected>Choose</option>
<option value="pos">Point Of Sales (P.O.S)</option>
<option value="transfer">Transfer</option>
<option value="cash">Cash On Delivery</option>
</select>
</td>
</tr>

<tr><td>Card Number:</td><td><input type="number" name="card_number" required="" /></td>
</tr>

<tr>
<td>    
    <?php  
echo "<a class ='fg-button teal'  id='back' href=" . base_url() . "index.php/Shopping_Cart>Back</a>"; ?>
</td>

<td><input class ='fg-button teal' type="submit" value="Make Payment" /></td>
</tr>

</table>
</div>
</form>
</div>
</body>
</html>