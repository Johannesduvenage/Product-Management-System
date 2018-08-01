<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class orderdetails extends CI_Controller{
    public function __construct(){
        parent :: __construct();
        $this->load->library(array('session','form_validation'));

        $this->load->helper(array('form','url'));
        $this->load->model("orderdetails_model"); 
        if(!$this->session->has_userdata("userid"))
        { 
            redirect(base_url()."login");
        } 
         
    }

    public function index(){
        $station=$this->uri->segment(3);
        $this->session->set_userdata('station',$station);
        $ordernum=$this->session->userdata('ordernum');
        $data['details']=$this->orderdetails_model->fetch($station,$ordernum);
        $data['activities']=$this->orderdetails_model->fetchactivity();
        $data['employee']=$this->orderdetails_model->fetchworkers();
        $data['sta']=$this->orderdetails_model->fetchstation();
        $this->load->view("superviser_view",$data);
        if(isset($_POST['stationsdisplay'])){
            redirect('station','refresh');
        } 
    }
    public function input(){
        $station=$this->session->userdata('station');        
        $this->form_validation->set_rules('date1','date','required');
        $this->form_validation->set_rules('workername','workername','required');
        $this->form_validation->set_rules('starttime','starttime','required');
        $this->form_validation->set_rules('activity','activity','required');     
        $this->form_validation->set_rules('grams','grams','required');        
        $this->form_validation->set_rules('weightin','weightin','required');        
        if($this->form_validation->run()==TRUE){
            
            $date=$this->input->post("date1");
            $time=$this->input->post('starttime'); 
            $worker=$this->input->post('workername');
            $activity=$this->input->post("activity");
            $grams=$this->input->post("grams");
            $lenin=$this->input->post("lengthin");
            $weiin=$this->input->post("weightin");
            $ordernum=$this->session->userdata('ordernum');
            
            $this->orderdetails_model->insert($date,$time,$worker,$activity,$grams,$lenin,$weiin,$ordernum,$station);
            redirect("orderdetails/index/".''.$station,'refresh');
        }
        else{
            redirect("orderdetails/index/".''.$station);
        }
        
    }

    public function output(){
        $station=$this->session->userdata('station');
        $this->form_validation->set_rules('add_emp','add_emp','required');
        $this->form_validation->set_rules('date','date','required');
        $this->form_validation->set_rules('endtime','endtime','required');
        $this->form_validation->set_rules('activity','activity','required');     
        $this->form_validation->set_rules('weightout','weightout','required');        
        if($this->form_validation->run()==TRUE){
            $date=$this->input->post("date");
            $time=$this->input->post('endtime');
            $activity=$this->input->post("activity");
            $lenout=$this->input->post("lengthout");
            $weiout=$this->input->post("weightout");
            $add_emp=$this->input->post("add_emp");
            $ordernum=$this->session->userdata('ordernum');
            $this->orderdetails_model->update($date,$time,$activity,$lenout,$weiout,$ordernum,$station,$add_emp);
           redirect("orderdetails/index/".''.$station,'refresh');
        }
        else{
           redirect("orderdetails/index/".''.$station);
        }  
    }
    
}
?>