<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping_Cart extends CI_Controller {
    public function __construct()
{
parent::__construct();
$this->load->library('session');
$this->load->helper('form');
$this->load->helper('url');
$this->load->library ('cart');
$this->load->model('Shopping_Model');

}

  public function index(){
$records=$this->Shopping_Model->get_all("product");
$data=array("products"=>$records);
$this->load->view("shopping_view" ,$data);
  }
  
  public function add_cart(){
      $insert_data=array(
                'id'=>$this->input->post('id'),
                'image'=>$this->input->post('image'),
                'name'=>$this->input->post('name'),
                'price'=>$this->input->post('price'),
                'qty'=>1);
$this->cart->insert($insert_data);

$this->load->view("cart_page");
  }

function remove_cart($rowid) {
if ($rowid==="all"){
$this->cart->destroy();
}else{
$data = array(
'rowid' => $rowid,
'qty' => 0
);
$this->cart->update($data);
}

redirect('Shopping_Cart');
}

  function update_cart(){
$cart_info = $_POST['cart'] ;
foreach( $cart_info as $id => $cart)
{
$rowid = $cart['rowid'];
$price = $cart['price'];
$amount = $price * $cart['qty'];
$qty = $cart['qty'];

$data = array(
'rowid' => $rowid,
'price' => $price,
'amount' => $amount,
'qty' => $qty
);

$this->cart->update($data);
}
        $this->load->view('cart_page');
}

    function billing_view(){
        $this->load->view('billing_view');
}

public function save_order()
{
$customer = array(
'name' => $this->input->post('name'),
'email' => $this->input->post('email'),
'address' => $this->input->post('address'),
'phone' => $this->input->post('phone'),
);
//save info to table in db
$cust_id = $this->Shopping_Model->insert_customer($customer);

$this->load->view('paymentDetails');
}

public function place_order()
{
$customer = array(
'fullname' => $this->input->post('fullname'),
'bank' => $this->input->post('bank'),
'payment_mode' => $this->input->post('payment_mode'),
'card_number' => $this->input->post('card_number'),
);
//save info to table in db
$cust_id = $this->Shopping_Model->insert_customer1($customer);

$order = array(
'date' => date('Y-m-d'),
'customer_id' => $cust_id
);

$ord_id = $this->Shopping_Model->insert_order($order);

if($cart = $this->cart->contents()):
foreach ($cart as $item):
$order_detail = array(
'order_id' => $ord_id,
'product_id' => $item['id'],
'quantity' => $item['qty'],
'price' => $item['price']
);

$cust_id = $this->Shopping_Model->insert_order_detail($order_detail);
endforeach;
endif;

$this->load->view('paymentDetails');
}

function billing_success(){
        $this->load->view('billing_success');
}

function checkOut_page(){
        $this->load->view('checkOut_page');
}


}
?>