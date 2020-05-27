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
}

?>