<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {

    function logindata($un,$pw)
    {
        $this->db->where('username',$un);               
        $this->db->where('password',$pw);
        $qry=$this->db->get("login_tbl");
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function insert_login($data)
    {
        $this->db->insert("login_tbl",$data);
        return $this->db->insert_id();
    }

    function select_countries()
    {
        $qry=$this->db->get('country_tbl');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function delete_login_byID($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("login_tbl");
        $this->db->affected_rows();
    }




}
