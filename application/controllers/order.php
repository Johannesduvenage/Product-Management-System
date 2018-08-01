<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class order extends CI_Controller{
    public function __construct(){
        parent :: __construct();
        $this->load->library('session');
        $this->load->helper(array('form','url'));
        $this->load->model("order_model");
        if(!$this->session->has_userdata("userid"))
        {
            redirect(base_url()."login");
        } 
        
    }
    public function index(){
        if(isset($_POST["submit"])){
            $ordernum=$this->input->post("ordernumber");
            $this->session->set_userdata('ordernum',$ordernum);
            redirect(base_url().'station');
        }
        else{
            $data['ordernum']=$this->order_model->select();
            $this->load->view('order_view',$data);
        }
    }
} 
?>