<?php
class Order_product_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->table = "order_product";
    }

    public function get_all($where = array(), $order_by ='id ASC', $select = '*', $limit=array())
    {
        $this->db->select($select)
            ->from($this->table)
            ->where($where);

        if(!empty($order_by))
            $this->db->order_by($order_by);

        if(!empty($limit))
            $this->db->limit($limit["count"],$limit["start"]);

        $results = $this->db->get()->result();

        return $results;
    }

    public function get($where=array()){

        $row = $this->db->where($where)->get($this->table)->row();

        return $row;

    }

    public function add($data=array()){

        $insert = $this
            ->db
            ->insert($this->table,$data);

        return $insert;
    }

    public function update($where=array(), $data=array()){

        $update = $this->db
            ->where($where)
            ->update($this->table, $data);

        return $update;

    }

    public function delete($where=array()){

        $delete = $this->db
            ->where($where)
            ->delete($this->table);

        return $delete;
    }

    public function get_insert_id(){

        return $this->db->insert_id();

    }

    /*benzersiz ürünleri getir*/
    public function get_distrinct($where = array()){
        $this->db->select('product_id');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->distinct('product_id');
       // $this->db->order_by('desk_id');
        $query = $this->db->get();
        return $query->result();
    }

    /*my functions*/
    public function get_sum_quantity($where = array()){
        $this->db->select_sum('quantity');
        return $this->db->where($where)->get($this->table)->row();
        //Array ( [0] => stdClass Object ( [paid] => 804896.36 ) )
    }


}


?>