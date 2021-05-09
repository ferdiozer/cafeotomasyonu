<?php

function is_login(){
    $CI = &get_instance();

    if (!empty($CI->session->userdata("login"))) {
        return true;
    }
    else{
        return false;
    }

}

function main_count($where = array(),$table){
    $CI=get_instance();

    $rows =$CI->db->where($where)->count_all_results($table);

    return $rows;

}

function get_desk_count($where_data = array()){
    $CI = &get_instance();
    $CI->load->model("Desk_model");
    return $CI->Desk_model->get_count($where_data);
}

function get_product_count($where_data = array()){
    $CI = &get_instance();
    $CI->load->model("Product_model");
    return $CI->Product_model->get_count($where_data);
}

function get_product_quantity($where_data = array()){
    $CI = &get_instance();
    $CI->load->model("Order_product_model");
    return $CI->Order_product_model->get_sum_quantity($where_data);
}


function get_user(){
    $CI = &get_instance();
    $user_id=1;

    if (isset($CI->session->userdata['login']['user_id'])) {
        $user_id = $CI->session->userdata['login']['user_id'];
    }
    $where_data=array('id'=>$user_id);
    $CI->load->model("User_model");
    return $CI->User_model->get($where_data);

}

function get_desk_category( $where_data=array()){
    $CI = &get_instance();
    $CI->load->model("Desk_category_model");
    return $CI->Desk_category_model->get($where_data);

}

function get_product( $where_data=array()){
    $CI = &get_instance();
    $CI->load->model("Product_model");
    return $CI->Product_model->get($where_data);

}

function get_product_category( $where_data=array()){
    $CI = &get_instance();
    $CI->load->model("Product_category_model");
    return $CI->Product_category_model->get($where_data);

}

function set_alert($title,$message,$icon){

    /* "warning", "error", "success" and "info".*/

    $CI = &get_instance();

    $data=   array(
        "title" =>$title,
        "message"=>$message,
        "icon"=>$icon);

    $CI->session->set_userdata("alert" , $data);
}