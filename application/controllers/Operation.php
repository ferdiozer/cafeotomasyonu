<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operation extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

                if (!is_login()) {
                    redirect(base_url('Account/loginPage'));
                }
        $this->load->model("Desk_model");
    }

	public function index()
	{

        $this->load->view('Dashboard/index');
	}

	public function DeskState($category_id=null){

        $this->load->model("Desk_category_model");

        /*$category_id = $this->input->get('desk_category');*/
        $where = array();
        if ($category_id!=null){
            $where = array('desk_category_id'=>$category_id);
        }
        $data = array(
            'desks'=>$this->Desk_model->get_all($where),
            'desk_categories'=>$this->Desk_category_model->get_all()
        );

        $this->load->view('Operation/DeskState',$data);
    }
    public function deskDetail($id){


        $product_category = $this->input->get('product_category');

        $product_category_where = array();

        if ($product_category!=null){
            $product_category_where = array('product_category_id'=>$product_category);
        }


        //echo "deskDetail:  ".$id;
        $this->load->model("Product_model");
        $this->load->model("Product_category_model");
        $this->load->model("Order_product_model");
        $data = array(
            'desk'=>$this->Desk_model->get(array('id'=>$id)),
            'products'=>$this->Product_model->get_all($product_category_where),
            'product_categories'=>$this->Product_category_model->get_all(),
            'order_products' =>$this->Order_product_model->get_all(array('desk_id'=>$id,'state'=>1)),
            'desks_for_transfer' =>$this->Desk_model->get_all(array('state'=>0))
        );

        $this->load->view('Operation/deskDetail',$data);
    }

    /*gider bilgisi*/
    public function expense(){

        $this->load->model("Expense_model");
        $this->load->model("Product_model");

        $date1= $this->input->post("date1_ex");
        $date2= $this->input->post("date2_ex");

        $where_expense = array();

        if ($date1!=null){
            $where_expense = array('date >='=>$date1);
        }
        if ($date2!=null){
            $where_expense = array('date <='=>$date2);
        }
        if ($date1!=null and $date2!=null){
            $where_expense = array('date >='=>$date1,'date <='=>$date2);
        }



        $data = array(
            'rows'=>$this->Expense_model->get_all($where_expense),
            'products' =>$this->Product_model->get_all()
        );

        $this->load->view('Operation/expense',$data);

    }
    /*gider ekle*/
    public function expense_add(){

        $title = $this->input->post('title');
        $type = $this->input->post('category_id');
        $price = $this->input->post('price');

        $this->load->model("Expense_model");


        $data = array(
            'title'=>$title,
            'type'=>$type,
            'price'=>$price
        );

        $insert = $this->Expense_model->add($data);
        if ($insert){
            redirect(base_url("Operation/expense"));
        }
        else{
            echo "false";
        }

    }
    /*gider sil*/
    public function expenseDelete($id){
        $this->load->model("Expense_model");
        $delete = $this->Expense_model->delete(array('id'=>$id));
        if ($delete){
            redirect(base_url("Operation/expense"));
        }
        else{
            echo "false";
        }
    }

    /*rapor bilgisi*/
    public function report(){

        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');

        $this->load->model("Order_product_model");
        $this->load->model("Payment_model");

        $where_payment = array();

        if ($date1!=null){
            //$date1 = $date1." 00:00:00";
            $where_payment = array_merge($where_payment,array('date >='=>$date1));
        }
        if ($date2!=null){
            $where_payment = array_merge($where_payment,array('date <='=>$date2));
        }
        if ($date1!=null and $date2!=null){
            $where_payment = array_merge($where_payment,array('date >='=>$date1,'date <='=>$date2));
        }


        $payment_rows =  $this->Payment_model->get_all($where_payment);

        $sales_total = $this->Payment_model->get_sum_paid($where_payment);

        $product_paid_distrinct_sales = $this->Order_product_model->get_distrinct($where_payment);

        $paid_products = array();

        //  foreach ($payment_rows)

      //  $where_order_product = array();

        $data = array(
            'order_products' =>$this->Order_product_model->get_all($where_payment),
            'payments' =>$payment_rows,
            'sales_total'=>$sales_total,
            'product_paid_distrinct_sales'=>$product_paid_distrinct_sales
        );

        // echo $date1." + ".$date2."+".count($payment_rows).$this->Payment_model->get_sum_paid();

        $this->load->view('Operation/report',$data);
    }

    public function test(){
        $this->load->model("Order_product_model");
        $rr = $this->Order_product_model->get_distrinct();
       print_r($rr);

    }


    /*rapor bilgisi*/
    public function report2(){

        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');

        $this->load->model("Order_product_model");
        $this->load->model("Payment_model");

        $where_payment = array();

        if ($date1!=null){
            //$date1 = $date1." 00:00:00";
            $where_payment = array_merge($where_payment,array('date >='=>$date1));
        }
        if ($date2!=null){
            $where_payment = array_merge($where_payment,array('date <='=>$date2));
        }
        if ($date1!=null and $date2!=null){
            $where_payment = array_merge($where_payment,array('date >='=>$date1,'date <='=>$date2));
        }


        $payment_rows =  $this->Payment_model->get_all($where_payment);

        $sales_total = $this->Payment_model->get_sum_paid($where_payment);

        $paid_products = array();

      //  foreach ($payment_rows)

        $where_order_product = array();

        $data = array(
            'order_products' =>$this->Order_product_model->get_all($where_order_product),
            'payments' =>$payment_rows,
            'sales_total'=>$sales_total
        );

       // echo $date1." + ".$date2."+".count($payment_rows).$this->Payment_model->get_sum_paid();

        $this->load->view('Operation/report',$data);
    }

    /*stok bilgisi*/
    public function stock(){

    }

}
