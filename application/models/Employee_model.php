<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {


    function insert_employee($data)
    {
        $this->db->insert("employee_tbl",$data);
        return $this->db->insert_id();
    }

    function select_employees()
    {
        $qry=$this->db->get('employee_tbl');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function select_employee_byID($id)
    {

        $this->db->where('id',$id);
        $qry=$this->db->get('employee_tbl');
        if($qry->num_rows()>0)
        {
            $result=$qry->result_array();
            return $result;
        }
    }

    function delete_employee($id)
    {
        $this->db->where('id', $id);
        $this->db->delete("employee_tbl");
        $this->db->affected_rows();
    }

    

    function update_employee($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('employee_tbl',$data);
        $this->db->affected_rows();
    }

    




}
