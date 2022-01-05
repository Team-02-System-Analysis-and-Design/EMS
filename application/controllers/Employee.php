<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        if ( ! $this->session->userdata('logged_in'))
        { 
            redirect(base_url().'login');
        }
    }

    public function index()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/add-employee');
        $this->load->view('admin/footer');
    }

    public function manage_employees()
    {
        $data['content']=$this->Employee_model->select_employees();
        $this->load->view('admin/header');
        $this->load->view('admin/manage-employee',$data);
        $this->load->view('admin/footer');
    }

    public function insert()
    {
        $employee=$this->input->post('txtemployee');
        $data=$this->Employee_model->insert_employee(array('employee_name'=>$employee));
        if($data==true)
        {
            $this->session->set_flashdata('success', "New Employee Added Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, New Employee Adding Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update()
    {
        $id=$this->input->post('txtid');
        $employee=$this->input->post('txtemployee');
        $data=$this->Employee_model->update_employee(array('employee_name'=>$employee),$id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Employee Updated Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Employee Update Failed.");
        }
        redirect(base_url()."employee/manage_employees");
    }


    function edit($id)
    {
        $data['content']=$this->Employee_model->select_employee_byID($id);
        $this->load->view('admin/header');
        $this->load->view('admin/edit-employee',$data);
        $this->load->view('admin/footer');
    }


    function delete($id)
    {
        $data=$this->Employee_model->delete_employee($id);
        if($this->db->affected_rows() > 0)
        {
            $this->session->set_flashdata('success', "Employee Deleted Succesfully"); 
        }else{
            $this->session->set_flashdata('error', "Sorry, Employee Delete Failed.");
        }
        redirect($_SERVER['HTTP_REFERER']);
    }



}
