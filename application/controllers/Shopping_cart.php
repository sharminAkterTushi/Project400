<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shopping_cart extends CI_Controller {
 
 function index()
 {
  $this->load->model("shopping_cart_model");
  $data["product"] = $this->shopping_cart_model->fetch_all();
  $this->load->view("shopping_cart", $data);
 }
 
 function add()
 {
  $this->load->library("cart");
  $data = array( 
   "id"  => $_POST["product_id"],
   "name"  => $_POST["product_name"],
   "qty"  => $_POST["quantity"],
   "price"  => $_POST["product_price"]
  );
  $this->cart->insert($data); //return rowid 
  echo $this->view();
 }



 function increase()
 {
  $this->load->library("cart");
  $data = array(
      'rowid' => $_POST["row_id"],
      'qty'   => $_POST["qnty"]+1
            );
$this->cart->update($data); 
  echo $this->view();
 }

 function decrease()
 {
  $this->load->library("cart");
  $data = array(
      'rowid' => $_POST["row_id"],
      'qty'   => $_POST["qnty"]-1
            );
$this->cart->update($data); 
  echo $this->view();

 }

 function load()
 {
  echo $this->view();
 }

 function remove()
 {
  $this->load->library("cart");
  $row_id = $_POST["row_id"];
  $data = array(
   'rowid'  => $row_id,
   'qty'  => 0
  );
  $this->cart->update($data);
  echo $this->view();
 }

 function clear()
 {
  $this->load->library("cart");
  $this->cart->destroy();
  echo $this->view();

 }
 
 function view()
 {
  $this->load->library("cart");
  $output = '';
  $output .= '
    <center><h3 style="color:#96588A">Your Cart</h3></center><br />
    <div class="table-responsive">
     <div align="right">
      <button style="background:#96588A;" type="button" id="clear_cart" class="btn btn-info">Clear Cart</button>
     </div>
     <br />
     <table class="table table-bordered striped">
      <tr style="background:#dcd8d8;">
       <th width="40%">Product Name</th>
       <th width="20%">Quantity</th>
       <th width="10%">Price</th>
       <th width="15%">Total</th>
       <th width="15%">Action</th>
      </tr>

    ';
    $total_rows = count($this->cart->contents());
    //$link = base_url()'Order';

    $count = 0;
    foreach($this->cart->contents() as $items)
    {
     $count++;
     $output .= '
     <tr style="background: #eaeaea;"> 
      <td class="pname" >'.$items["name"].'</td>
      <td>'.'<button class="increase" style="background:#96588A;border:none;color:white;" id="'.$items["rowid"].'"> + </button>'." "."<span>".$items["qty"]."</span>"." ".'<button style="background:#96588A;border:none;color:white;" class="decrease" id="'.$items["rowid"].'"> - </button>'.'</td>
      <td class="pprice" >'."$".$items["price"].'</td>
      <td>'."$".$items["subtotal"].'</td>
      <td><button type="button" name="remove" class="btn btn-danger btn-xs remove_inventory" id="'.$items["rowid"].'">Remove</button></td>
     </tr>
     ';
    }
    $output .= '
     <tr style="background:#f3d6d6;">
           <td></td>
      <td style="font-weight:700;">Grand Total</td>
      <td></td>
      <td style="font-weight:700;" id="total_pay">'."$".$this->cart->total().'</td>
      <td></td>
      <input id="cart_to_rows" type="hidden" value="'.$total_rows.'">
     </tr>
    </table>
    <a href="'.base_url()."".'" style="float:right;color:white;background:#31708f;padding:5px;">Procceed to order</a>
    </div>
    ';

  if($count == 0)
  {
   $output = '<h3 align="center"  style="color: #96588A;">Cart is Empty</h3>';
   $output .= '<input id="cart_to_rows" type="hidden" value="'.$total_rows.'">';
  }
  return $output;
 }
}
