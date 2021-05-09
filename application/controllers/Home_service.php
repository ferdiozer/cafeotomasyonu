<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_service extends CI_Controller {


    public function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Europe/Istanbul');

    }

	public function index()
	{
		//echo date('Y-m-d H:i:s');
	}

	public function desk_all(){
        $this->load->model("Desk_model");

       $rows = $this->Desk_model->get_all();

       echo json_encode($rows);
    }

    /*masaya sipariş ekleme*/
    public function order_add(){

	    $product_id   = $this->input->post('product_id');
	    $quantity   = $this->input->post('quantity');
	    $desk_id   = $this->input->post('desk_id');

	    $data = array(
	        "product_id"=>$product_id,
            "quantity"=>$quantity,
            "desk_id"=>$desk_id
        );

        $insert = $this
            ->db
            ->insert('order_product',$data);
        if ($insert){
            echo "true";
        }

        $this->load->model("Desk_model");

        $row = $this->Desk_model->get(array("id"=>$desk_id));

        if($row->state==0){
            $this->Desk_model->update(array("id"=>$desk_id),array("state"=>1,'date'=>date('Y-m-d H:i:s')));
        }

    }


    /*ürünleri getir*/
    public function get_order_product($product_category=null){

        $this->load->model("Product_model");

        $product_category_where = array();

       // $product_category = $this->input->post('product_category');

        if ($product_category!=null){
            $product_category_where = array_merge($product_category_where,array('product_category_id'=>$product_category));
        }

        $order_products = $this->Product_model->get_all($product_category_where);

        echo json_encode($order_products);
    }

    /*masaya ürün ekleme*/
    public function add_product_desk(){
        //masa_id,ürün_id,adet
        $desk_id = $this->input->post('desk_id');
        $product_id = $this->input->post('product_id');
        $quantity = $this->input->post('quantity');

        $this->load->model("Order_product_model");
        $this->load->model("Desk_model");

        $data = array(
            'desk_id'=>$desk_id,
            'product_id'=>$product_id,
            'quantity'=>$quantity,
            'state'=>1

        );
        $insert =$this->Order_product_model->add($data);

        if ($insert){


            $row = $this->Desk_model->get(array("id"=>$desk_id));

            if($row->state==0){
                $this->Desk_model->update(array("id"=>$desk_id),array("state"=>1,'date'=>date('Y-m-d H:i:s')));

                echo "true";
            }

        }
    }

    public function test(){

        $this->db->select("id")
            ->from("order_product");
        $this->db->group_by("product_id");

        print_r($this->db->get()->result());

    }

    public function get_desk_date(){
        $id = $this->input->post('desk_id');
        $row = $this->Desk_model->get(array("id"=>$id));

        echo $row->date;
    }

    /*açık masa nın toplam tutarını getir */
    //kullanılmıyor şimdilk
    public function get_open_desk_total_price(){
        $desk_id = $this->input->post('desk_id');

        $this->load->model("Order_product_model");

        $get_all_order_products =  $this->Order_product_model->get_all(array('desk_id'=>$desk_id,'state'=>1));

        $price_total=0;
        foreach ($get_all_order_products as $item){
            $price_total = $price_total+  get_product(array('id'=>$item->product_id))->price_default*$item->quantity;
        }
        echo $price_total;

    }
    /*alman üsulu hesap ödeme*/
    public function paid_with_german(){
        $order_product_id = $this->input->post('order_product_id');
        $desk_id = $this->input->post('desk_id');//şuanlık kullanılmıyor

        $this->load->model("Order_product_model");

        $update = $this->Order_product_model->update(array('id'=>$order_product_id),array('is_paid'=>1));
        if ($update){
            echo "true";
        }
    }
    /* masa hesap kapatma*/
    public function closed_desk(){
        $desk_id = $this->input->post('desk_id');
        $payment_type = $this->input->post('payment_type');

        if ($payment_type==null){
            $payment_type=1;
        }

        $this->load->model("Order_product_model");
        $this->load->model("Desk_model");
        $this->load->model("Payment_model");

        $get_all_order_products =  $this->Order_product_model->get_all(array('desk_id'=>$desk_id,'state'=>1));

        $price_total=0;
        foreach ($get_all_order_products as $item){

               $price_total = $price_total+  get_product(array('id'=>$item->product_id))->price_default*$item->quantity;

        }

        $add_data = array(
            'paid'=>$price_total,
            'payment_type_id'=>$payment_type
        );
        $this->Payment_model->add($add_data);

    //    $this->load->model("Payment_model");


        $update =  $this->Desk_model->update(array('id'=>$desk_id),array('state'=>0));
        $update2 =  $this->Order_product_model->update(array('desk_id'=>$desk_id,'state'=>1),array('state'=>0,'is_paid'=>1));

        if ($update and $update2){
            echo "true";
        }


    }

    /*masaya giden ürünü silme (iptal etme */
    public function delete_order_product(){
        $id = $this->input->post('order_product_id');

        $this->load->model("Order_product_model");

        $delete = $this->Order_product_model->delete(array('id'=>$id));
        if ($delete){
            echo "true";
        }
    }
    /*masa taşıma*/
    public function desk_transfer(){
        $desk_old_id = $this->input->post('desk_old_id');
        $desk_new_id = $this->input->post('desk_new_id');

        $this->load->model("Order_product_model");
        $this->load->model("Desk_model");



       $update_transfer = $this->Order_product_model->update(array('desk_id'=>$desk_old_id,'state'=>1),array('desk_id'=>$desk_new_id));

       if ($update_transfer){
           $update_desk_state1 = $this->Desk_model->update(array('id'=>$desk_old_id),array('state'=>0));
           $update_desk_state2 = $this->Desk_model->update(array('id'=>$desk_new_id),array('state'=>1));
           echo "true";
       }

    }



}
