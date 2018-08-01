<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller{
    public function __construct(){
        parent ::__construct();
        $this->load->helper(array('url','form'));
        $this->load->database();
        $this->load->model('login_model');
        $this->load->library(array('form_validation','session'));
    }
    public function index(){
        $this->load->view('login_view');
        $this->form_validation->set_rules('username','username',"required|alpha_numeric");
        $this->form_validation->set_rules('password1','pass',"required|alpha_numeric");
        if($this->form_validation->run()==TRUE){
            $user=$this->input->post('username');
            $pass=$this->input->post('password1');
            $this->load->model('login_model');
            $data=$this->login_model->checkdata($user);
            if(!empty($data)){ 
                if($data->status==1){
                    if($data->password==$pass and $data->username==$user){
                    $this->session->set_userdata('user_status',$data->status);
                    $this->session->set_userdata('userid',$data->username);
                    redirect(base_url().'create');
                    }
                }
                elseif($data->status==0){
                    if($data->password==$pass and $data->username==$user){
                        $this->session->set_userdata('user_status',$data->status);
                        $this->session->set_userdata('userid',$data->username);
                        redirect(base_url().'order');
                    }
                }
            
                else{
                    redirect(current_url(),'refresh');
                }
            }
        }
    }
    public function forget(){
        $this->form_validation->set_rules('id','id','required|alpha_numeric');
        if($this->form_validation->run()==TRUE){
            $id=$this->input->post('id');
            $config=Array(
                'protocol'=>'smtp',
                'smtp_host'=>'ssl://smtp.googlemail.com',
                'smtp_port'=>'465',
                'smtp_user'=>'saiabhishek0@gmail.com',
                'smtp_pass'=>'mummydaddy',
            );
            $data=$this->login_model->checkdata($id);
            $this->load->library('email',$config);
            $this->email->set_newline("\r\n");
            $this->email->from("saiabhishek0@gmail.com",'Abhishek');
            $this->email->to($data->email);
            $this->email->subject("Email Recovery System...");
            $this->email->message("The recovery password is  : .$data->password");
            if($this->email->send()){
                echo 'email has sent sucseccfully';
            }else{
                show_error($this->email->print_debugger());
            }

        }else{
            $this->load->view('forget_view');
        }
    }
    public function logout(){
        $this->session->unset_userdata('userid');
        $this->session->sess_destroy();
        redirect(base_url().'login');
    }
}
?>