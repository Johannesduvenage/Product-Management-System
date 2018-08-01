<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class station extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->helper(array('url','form'));
        $this->load->database();
        $this->load->library(array('form_validation','session'));
        $this->load->model('station_model');
        $g=$this->session->userdata('user_status');
        if(!$this->session->has_userdata("userid"))
        {
            redirect(base_url()."login");
        } 
    }
    public function index(){
        $data1['key']=$this->station_model->fetch();
        $data1['keystatus']=$this->station_model->fetchstatus($this->session->userdata('ordernum'));
        $data1['quan']=$this->station_model->selectquan();
        $this->load->view('station_view',$data1);
    }
    public function insert(){
        $this->form_validation->set_rules('quantity','quantity','required');
        if($this->form_validation->run()==TRUE){
            $quan=$this->input->post('quantity');
            $d=$this->station_model->insert($quan);
            if($d){
                redirect(base_url().'station','refersh');
            }else{
                echo "<script>
                alert('Unable to insert!');
                window.location.href = '" . base_url() . "station';
                </script>"; 
            }
        }else{
            echo "<script>
            alert('Unable to insert!');
            window.location.href = '" . base_url() . "station';
            </script>";
        }
    }

    public function update(){ 
        $station=$this->session->userdata('station'); 
        $ordernum=$this->session->userdata('ordernum');
        $this->form_validation->set_rules('optradio','radiobutton','required');
        $this->form_validation->set_rules('inputstatus','status','required');
        if($this->form_validation->run()==TRUE){
        $inputstatus=$this->input->post('inputstatus');
        $option=$this->input->post('optradio');
        if($option=='complete'){
        $status=1;
        $this->station_model->display($station,$ordernum,$status); 
        $this->station_model->updatestatus($inputstatus,$ordernum);
        }
        if($option=='partial'){
        $this->station_model->updatestatus($inputstatus,$ordernum);
        }
        $data1['key']=$this->station_model->fetch();
        $data1['keystatus']=$this->station_model->fetchstatus($this->session->userdata('ordernum'));
        $data1['quan']=$this->station_model->selectquan();
        $this->load->view('station_view',$data1);
    }
    }
    public function reupdate(){ 
        $station=$this->session->userdata('station');
        $ordernum=$this->session->userdata('ordernum');
        $status=0;
        $this->station_model->display($station,$ordernum,$status);
        $data1['key']=$this->station_model->fetch();
        $data1['keystatus']=$this->station_model->fetchstatus($this->session->userdata('ordernum'));
        $data1['quan']=$this->station_model->selectquan();
        $this->load->view('station_view',$data1);
    }
}