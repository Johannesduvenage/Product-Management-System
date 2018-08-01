<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class barcode extends CI_Controller{ 
    public function __construct(){
        parent ::__construct();
        $this->load->database();
        $this->load->helper('url');
        $this->load->library(array('form_validation','session'));
        $this->load->model('barcode_model');
        $g=$this->session->userdata('user_status');
        if(!$this->session->has_userdata("userid"))
        {
            redirect(base_url()."login");
        } 
    }
    public function index(){
        $data['ordnum']=$this->barcode_model->retrive();
        if(isset($_POST["submitform"])){
            $order=$this->input->post('ordernum');
            $data['details']=$this->barcode_model->retrivedetails($order);
            $this->load->view('barcode_view',$data);
        }
        else{
        $this->load->view('barcode_view',$data);
        }
    }
    public function insert(){
        $order=$this->input->post("ordernum");
        $type=$this->input->post("type");
        $color=$this->input->post("color");
        $length=$this->input->post("length");
        $extenstion=$this->input->post("extenstion");
        $size=$this->input->post("size");
        
        $this->barcode_model->insertion($type,$color,$length,$extenstion,$size,$order);
        redirect(base_url().'barcode','refresh');
    }
    public function retrivedata(){
        $ordernum=$this->input->post("ordernum");
        $data['details']=$this->barcode_model->retriveorder();
    }
}

?>