<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Shopping_Model extends CI_Model {

  public function get_all($tableName){
      $this->db->select();
      $this->db->from($tableName);
      $query =$this->db->get();
     return $query->result();
    }

// Insert customer details in "customers" table in database.
public function insert_customer($data)
{
$this->db->insert('customers', $data);
$id = $this->db->insert_id();
return (isset($id)) ? $id : FALSE;
}

public function insert_customer1($data)
{
$this->db->insert('billing', $data);
$id = $this->db->insert_id();
return (isset($id)) ? $id : FALSE;
}

// Insert order date with customer id in "orders" table in database.
public function insert_order($data)
{
$this->db->insert('orders', $data);
$id = $this->db->insert_id();
return (isset($id)) ? $id : FALSE;
}

// Insert ordered product detail in "order_detail" table in database.
public function insert_order_detail($data)
{
$this->db->insert('order_detail', $data);
}

public function sendApiRequest(){

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\"email\":\"gafar.ololade@gmail.com\",\"amount\":\"200\"}",
  CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer sk_test_d08e0f24035ced91b94fd942796116ee84f20863",
    "Content-Type: application/json",
    "Cookie: __cfduid=d0bbce774077fe337dcc3d36a183035941590769896; sails.sid=s%3A1p0zAxy2K_r1TkaeWPZC-kFfWT3visdB.0iHEWKHPkCvr0GqPB6OH5At4GgdsuHDxBYU%2FfuAzzl4"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;

  }

}

?>