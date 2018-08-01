<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class edit extends CI_Controller{
    public function __construct(){
        parent :: __construct();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('form','url'));
        $this->load->model("edit_model");
        if(!$this->session->has_userdata("userid"))
        { 
            redirect(base_url()."login");
        }  
        
    }
    public function index(){
        if(isset($_POST["submit"])){
      
                $station=$this->session->userdata('station');
                $worker=$this->input->post('workername');
                $start_date=$this->input->post('start_date');
                $start_time=$this->input->post('start_time');
                $end_date=$this->input->post('end_date');
                $end_time=$this->input->post('end_time');
                $grams=$this->input->post("grams");
                $lenin=$this->input->post("lenin");
                $weiin=$this->input->post("weiin");
                $lenout=$this->input->post("lenout");
                $weiout=$this->input->post("weiout");
                $ordernum=$this->session->userdata('ordernum');
                $id=$this->session->userdata('sid');
                $this->edit_model->update($worker,$grams,$lenin,$lenout,$weiin,$weiout,$id,$start_date,$start_time,$end_date,$end_time);
                redirect("orderdetails/index/".''.$station,'refresh');
        
        }
        else{ 
            $id=$this->uri->segment(3);
            $this->session->set_userdata('sid',$id);
            $data['order']=$this->edit_model->select($id);
             $data['employee']=$this->edit_model->fetchworkers();
             $this->load->view('edit_view',$data);
        }
    }
}
?>