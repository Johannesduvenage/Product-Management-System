<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class settings extends CI_Controller{
    public function __construct(){
        parent :: __construct();
        $this->load->library(array('form_validation','session'));
        $this->load->helper(array('form','url'));
        $this->load->database();
        $this->load->model('settings_model');
        $this->load->model('orderdetails_model');
        $g=$this->session->userdata('user_status');
        if(!$this->session->has_userdata("userid"))
        {
            redirect(base_url()."login"); 
        } 
    }
    public function index(){
        $data['activities']=$this->orderdetails_model->fetchactivity();
        $data['employee']=$this->orderdetails_model->fetchworkers();
        $data['stations1']=$this->orderdetails_model->fetchstation();
        $data['order']=$this->settings_model->fetchorder();
        $this->load->view('settings_view',$data);
    }
    public function deleteorder(){
        $this->form_validation->set_rules('delorder','ordernum','required');
        if($this->form_validation->run()){
            $ordernum=$this->input->post('delorder');
           $s= $this->settings_model->delorder($ordernum);
           echo "<script>
           alert('Successfully deleted!');
           window.location.href = '" . base_url() . "settings';
           </script>";
        }else{
            echo "<script>
            alert('Form validation error occurs try again!');
            window.location.href = '" . base_url() . "settings';
            </script>";
        }
    }
    public function changeuser(){
        $this->form_validation->set_rules('olduser','username',"required|alpha_numeric");
        $this->form_validation->set_rules('newuser','newuser',"required|alpha_numeric");
        if($this->form_validation->run()==TRUE){
        $olduser=$this->input->post('olduser');
        $newuser=$this->input->post('newuser');
        $p=$this->session->userdata('userid');  
        if($p==$olduser){
            $s=$this->settings_model->changeuser($olduser,$newuser);
        }else{
            echo 'hii';
        }
            if($s){
                $this->session->unset_userdata('userid');
                redirect(base_url().'login');
            }else{
                
                redirect(current_url());
            }
        }else{
            $data['activities']=$this->orderdetails_model->fetchactivity();
            $data['employee']=$this->orderdetails_model->fetchworkers();
            $data['stations1']=$this->orderdetails_model->fetchstation();
            $this->load->view('settings_view',$data);
        }

    }
    public function changepass(){
     $this->form_validation->set_rules('old_pass','password','required');
       $this->form_validation->set_rules('new_pass','password1','required');
       $this->form_validation->set_rules('confirm_pass','password2','required');
        if($this->form_validation->run()==TRUE){
            $old_pass=$this->input->post('old_pass');
            $new_pass=$this->input->post('new_pass');
            $confirm_pass=$this->input->post('confirm_pass');
            $p=$this->session->userdata('userid');
            $this->load->model('login_model');
            $s=$this->login_model->checkdata($p);
            if($s->password==$old_pass && $new_pass==$confirm_pass){
                $g=$this->settings_model->changepass1($p,$new_pass);
                if($g==TRUE){
                    $this->session->unset_userdata('userid');
                    redirect(base_url().'login');
                }else{
                    redirect(current_url());
                }
            } else{
                echo "password does not match or enter with the correct pass";
                
            }          
        }else{
            $data['activities']=$this->orderdetails_model->fetchactivity();
            $data['employee']=$this->orderdetails_model->fetchworkers();
            $data['stations1']=$this->orderdetails_model->fetchstation();
            $this->load->view('settings_view',$data);
        }
    }
    public function changeemail(){
        $this->form_validation->set_rules('new_email','email',"required");
        $this->form_validation->set_rules('old_email','email',"required");
        if($this->form_validation->run()==TRUE){
            $new_email=$this->input->post('new_email');
        $old_email=$this->input->post('old_email');
        $p=$this->session->userdata('userid');
           $s=$this->settings_model->changeemail($p,$new_email);
        if($s){
            $this->session->unset_userdata('userid');
            redirect(base_url().'login');
        }else{
            redirect(current_url());
        }
        }else{
            $data['activities']=$this->orderdetails_model->fetchactivity();
            $data['employee']=$this->orderdetails_model->fetchworkers();
            $data['stations1']=$this->orderdetails_model->fetchstation();
            $this->load->view('settings_view',$data);
        }
    }
    public function adduser(){
        $this->form_validation->set_rules('add_user','username','required');
        $this->form_validation->set_rules('add_pass','password','required');
        $this->form_validation->set_rules('add_email','email','required|valid_email');
        $this->form_validation->set_rules('add_cnf_pass','confirm password','required');
        $this->form_validation->set_rules('optradio','radiobutton','required');
        if($this->form_validation->run()==TRUE){
           $add_user=$this->input->post('add_user');
           $add_pass=$this->input->post('add_pass');
           $add_cnf_pass=$this->input->post('add_cnf_pass');
           $add_email=$this->input->post('add_email');
           $option=$this->input->post('optradio');
           if($add_pass==$add_cnf_pass){
               if($option=='admin'){
                   $status=1;
                $g=$this->settings_model->adduser1($add_user,$add_pass,$add_email,$status);
               }
               if($option=='superviser'){
                $status=0;
                $g=$this->settings_model->adduser1($add_user,$add_pass,$add_email,$status);
               }
               if($g){
                redirect(base_url().'settings');
            }else{
                redirect(current_url());
            }
           }else{
            $data['activities']=$this->orderdetails_model->fetchactivity();
            $data['employee']=$this->orderdetails_model->fetchworkers();
            $data['stations1']=$this->orderdetails_model->fetchstation();
            $this->load->view('settings_view',$data);
           }
        }else{
            $data['activities']=$this->orderdetails_model->fetchactivity();
            $data['employee']=$this->orderdetails_model->fetchworkers();
            $data['stations1']=$this->orderdetails_model->fetchstation();
            $this->load->view('settings_view',$data);
        }
    }
    public function activitychange(){
        $this->form_validation->set_rules('add_act','activity','required');
        $this->form_validation->set_rules('optradio1','radiobutton','required');
        $this->form_validation->set_rules('add_sta1','station','required');
        if($this->form_validation->run()==TRUE){
           $add_act=$this->input->post('add_act');
           $option=$this->input->post('optradio1');
           $add_sta=$this->input->post('add_sta1');
           $set=$this->settings_model->selectid($add_sta);
           $id=0;
            foreach($set as $p){
                $id=$p->id;
            }
           
               if($option=='add'){
                $k=$this->settings_model->checkactivity($add_act,$id);
                if($k==TRUE){
                    echo "<script>
                    alert('Entered  Activity is already exist try with other name under this station!');
                    window.location.href = '" . base_url() . "settings';
                    </script>";
                }
                else{
                $g=$this->settings_model->addactivity($add_act,$id);
                if($g){
                    echo "<script>
                    alert('Sucsessfully Added!');
                    window.location.href = '" . base_url() . "settings';
                    </script>";
                }else{
                    echo "<script>
                    alert('Unable to add please try again!');
                    window.location.href = '" . base_url() . "settings';
                    </script>";
                }
            }
               }
               if($option=='delete'){
            
                $p=$this->settings_model->delactivity($add_act,$id);
                if($p){
                    echo "<script>
                    alert('Sucsessfully Deleted!');
                    window.location.href = '" . base_url() . "settings';
                    </script>";
                }else{
                    echo "<script>
                    alert('Unable to Delete please try again!');
                    window.location.href = '" . base_url() . "settings';
                    </script>";
                }
               }
              
        }else{
            $data['activities']=$this->orderdetails_model->fetchactivity();
            $data['employee']=$this->orderdetails_model->fetchworkers();
            $data['stations1']=$this->orderdetails_model->fetchstation();
            $this->load->view('settings_view',$data);
        }

}
public function stationchange(){
    $this->form_validation->set_rules('add_sta','station','required');
    $this->form_validation->set_rules('optradio2','radiobutton','required');
    if($this->form_validation->run()==TRUE){
       $add_sta=$this->input->post('add_sta');
       $option=$this->input->post('optradio2');
           if($option=='add'){
            $k=$this->settings_model->checkstation($add_sta);
            if($k==TRUE){
                echo "<script>
                alert('Entered Station name is already exist try with other name');
                window.location.href = '" . base_url() . "settings';
                </script>";
            }
            else{
            $g=$this->settings_model->addstation($add_sta);
            if($g){
                echo "<script>
                alert('Sucsessfully Added!');
                window.location.href = '" . base_url() . "settings';
                </script>";
            }else{
                echo "<script>
                alert('Unable to add please try again!');
                window.location.href = '" . base_url() . "settings';
                </script>";
            }
        }
           }
           if($option=='delete'){
        
            $p=$this->settings_model->delstation($add_sta);
            if($p){
                echo "<script>
                alert('Sucsessfully Deleted!');
                window.location.href = '" . base_url() . "settings';
                </script>";
            }else{
                echo "<script>
                alert('Unable to Delete please try again!');
                window.location.href = '" . base_url() . "settings';
                </script>";
            }
           }
      
    }else{
        $data['activities']=$this->orderdetails_model->fetchactivity();
        $data['employee']=$this->orderdetails_model->fetchworkers();
        $data['stations1']=$this->orderdetails_model->fetchstation();
        $this->load->view('settings_view',$data);
    }


  
}

public function employeechange(){
    $this->form_validation->set_rules('add_emp','station','required');
    $this->form_validation->set_rules('optradio3','radiobutton','required');
    if($this->form_validation->run()==TRUE){
       $add_emp=$this->input->post('add_emp');
       $option=$this->input->post('optradio3');

           if($option=='add'){
            $s=$this->settings_model->checkemployee($add_emp);
            if($s==TRUE){
                echo "<script>
                alert('Entered Employee name is already exist try with other name');
                window.location.href = '" . base_url() . "settings';
                </script>";
            }
                else{
            $g=$this->settings_model->addemployee($add_emp);
            if($g){
                echo "<script>
                alert('Sucsessfully Added!');
                window.location.href = '" . base_url() . "settings';
                </script>";
            }else{
                echo "<script>
                alert('Unable to add please try again!');
                window.location.href = '" . base_url() . "settings';
                </script>";
            }
        }
           }
           if($option=='delete'){
        
            $p=$this->settings_model->delemployee($add_emp);
            if($p){
                echo "<script>
                alert('Sucsessfully Deleted!');
                window.location.href = '" . base_url() . "settings';
                </script>";
            }else{
                echo "<script>
                alert('Unable to Delete please try again!');
                window.location.href = '" . base_url() . "settings';
                </script>";
            }
           }
           
      
    }else{
        $data['activities']=$this->orderdetails_model->fetchactivity();
        $data['employee']=$this->orderdetails_model->fetchworkers();
        $data['stations1']=$this->orderdetails_model->fetchstation();
        $this->load->view('settings_view',$data);
    }

}
public function delete(){    
            $this->form_validation->set_rules('start_date','start date','required');
            $this->form_validation->set_rules('end_date','end date','required');
            if($this->form_validation->run()==TRUE){
                $start_date=$this->input->post('start_date');
                $end_date=$this->input->post('end_date');
               $p=$this->settings_model->flush($start_date,$end_date);
               redirect(base_url().'settings','refersh');
            }else{
                echo validation_errors();
            }
    
}
}   