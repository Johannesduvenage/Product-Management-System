<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class create extends CI_Controller{
    public function __construct(){
        parent :: __construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('form','url'));
        $this->load->model("create_model");
        $g=$this->session->userdata('user_status');
        if($g==0){
            redirect(base_url()."login/logout");
        }
        if(!$this->session->has_userdata("userid"))
        {
            redirect(base_url()."login");
        } 
        
    }
    public function index(){
        if(isset($_POST["submit"])){
            $this->form_validation->set_rules('ordernum','order number','required');
            $this->form_validation->set_rules('items','item no','required');
            $this->form_validation->set_rules('email','email id'.'required');
            if($this->form_validation->run()==TRUE){
                $ordernum=$this->input->post('ordernum');
                $items=$this->input->post('items');
                $email=$this->input->post('email');
            $date=$this->create_model->insert($ordernum,$items,$email);
            redirect(base_url().'create','refresh');
            }else{
                echo validation_errors();
            }
        }
        else{
            $this->load->view('create_view');
        }
    }
}
?>