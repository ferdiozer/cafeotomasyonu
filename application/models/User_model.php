<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {

        parent::__construct();

        $this->table = "user";

    }

    public function get_all($where = array(), $order_by ='id ASC', $select = '*', $limit=array()){

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




    public function get_like($where = array(), $order_by ='id ASC', $select = '*', $like1){
        /*
                $like = array('name'=>$like1,
                    'surname'=>$like1,
                    'username'=>$like1,
                    'email'=>$like1);
        */
        $this->db->select($select)

            ->from($this->table)

            ->where($where);

        if(!empty($order_by))

            $this->db->order_by($order_by);

        $this->db->like("name",$like1);
        $this->db->or_like("surname",$like1);
        $this->db->or_like("username",$like1);
        $this->db->or_like("email",$like1);

        $results = $this->db->get()->result();

        return $results;

    }



    public function resolve_user_login($username, $password)
    {

        $parcala = explode("@", $username);
        $result = false;
        $k_num = count($parcala);
        if ($k_num == 1) {
            $col_name = 'username';
        } else if ($k_num == 2) {
            $col_name = 'email';
        }

        $where_data = array($col_name=>$username,
            'is_deleted'=>0);

        $row = $this->db->where($where_data)->get($this->table)->row();
        if (count($row) == 1) {

            $code = $row->password;
            $id = $row->id;

            $is_confirmed = $row->is_confirmed;

            try {

                $encode=$this->encrypt->decode($code);
                if ($encode == $password) {

                    if ($is_confirmed==1){

                        $result = true;

                        $Logindata = array(
                            "user_id" => (int)$id,
                            "logged_in" => (bool)true);

                        $this->session->set_userdata("login", $Logindata);
                    }
                    else{
                        $result = true;
                        set_alert("UYARI !","Hesabınız Borcunuzdan Dolayı Kapatılmıştır.","warning");
                    }

                } else {
                    $result = false;
                }


                return $result;
            } catch (Exception $e) {
                $result = false;
            }


        } else {
            $result = false;
        }
        return $result;
    }



    public function password_is_true($password){
        $result = false;

        $row = $this->db->where('username', get_user()->username)->get($this->table)->row();
        if (count($row) == 1) {

            $code = $row->password;

            try {
                $encode = $this->encrypt->decode($code);
                if ($encode == $password){
                    $result =true;
                }
                }
            catch
                (Exception $e) {
                    $result = false;
                }
    }
        return $result;
    }

    /*geçerli mail mi, girilen mail var mı ?*/
    public function is_there_mail($current_mail){
        $row = $this->db->where('email',$current_mail)->get($this->table)->row();
        if (count($row) == 1) {
            return true;
        }
        return false;
    }



}

