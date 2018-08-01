<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class data extends CI_Controller{
    public function __construct(){
        parent :: __construct();
        $this->load->database();
        $this->load->library(array('session','form_validation'));
        $this->load->helper(array('form','url'));
        $this->load->model("data_model");
        $this->load->model("settings_model");

        $g=$this->session->userdata('user_status');
        if($g==0){
            redirect(base_url()."login/logout");
        }
        if(!$this->session->has_userdata("userid"))
        {
            redirect(base_url()."login");  
        }  
        
    }
    public function daily(){
                $data['hello']=$this->data_model->selectstation(); 
                $data['worker']=$this->data_model->selectworker();
                $data['daily']=$this->data_model->selectdaily();
                    $this->load->view('daily_view',$data); 
    }
    public function monthly(){
        if(isset($_POST['monthly_submit'])){
            $this->form_validation->set_rules('start_date','date','required');
            $this->form_validation->set_rules('end_date','date','required');
            $start_date=$this->input->post('start_date');
            $end_date=$this->input->post('end_date');
            $this->session->set_userdata('start_date',$start_date);
            $this->session->set_userdata('end_date',$end_date);
            $data['monthly']=$this->data_model->monthlyreport($start_date,$end_date);
            if($this->form_validation->run()==TRUE){
                
                $this->load->view('monthly_view',$data);
            }else{
                $this->load->view('monthly_view',$data);
            }
        }else{
            $start_date=$this->input->post('start_date');
            $end_date=$this->input->post('end_date');
            $data['monthly']=$this->data_model->monthlyreport($start_date,$end_date);
            $this->load->view('monthly_view',$data);
        }
    
}
public function dailyreport(){
    if(isset($_POST['dailyreport_submit'])){
        $this->form_validation->set_rules('dailyreport_date','date','required');
        $date=$this->input->post('dailyreport_date');
        $this->session->set_userdata('date',$date);
        $data['dailyreport']=$this->data_model->dailyreport($date);
        if($this->form_validation->run()==TRUE){
            $this->load->view('dailyreport_view',$data);
        }else{
            $this->load->view('dailyreport_view',$data);
        }
    }else{
        $date=$this->input->post('dailyreport_date');
        $data['dailyreport']=$this->data_model->dailyreport($date);
        $this->load->view('dailyreport_view',$data);
    }

}
public function emp(){
    if(isset($_POST['emp_submit'])){
        $this->form_validation->set_rules('start_date','date','required');
        $this->form_validation->set_rules('end_date','date','required');
        $start_date=$this->input->post('start_date');
        $end_date=$this->input->post('end_date');
        $this->session->set_userdata('start_date',$start_date);
        $this->session->set_userdata('end_date',$end_date);
        $data=$this->data_model->employeereport();
        $this->load->view('empreport_view');
        if($this->form_validation->run()==TRUE){
            foreach($data as $emp){
            
                $data1['emp']=$this->data_model->empdatafetch($start_date,$end_date,$emp->employee);
                $this->load->view('employee_table',$data1);
            }
            $this->load->view('footer');
        }else{
            foreach($data as $emp){ 
            
                $data1['emp']=$this->data_model->empdatafetch($start_date,$end_date,$emp->employee);
                $this->load->view('employee_table',$data1);
            }
            $this->load->view('footer');
        }
    }else{
        $data['emp1']=$this->data_model->employeereport();
        $this->load->view('empreport_view');
        $this->load->view('employee_table',$data);
        $this->load->view('footer');
        
    }
}
public function workeractivity(){
    $go['hello']=$this->data_model->employeeactivity_report();
    $this->load->view('workeractivity_view',$go);
}
public function companyavgactivity(){
    if(isset($_POST['company_submit'])){
        $this->form_validation->set_rules('start_date','date','required');
        $this->form_validation->set_rules('end_date','date','required');
        $start_date=$this->input->post('start_date');
        $end_date=$this->input->post('end_date');
        $this->session->set_userdata('start_date',$start_date);
        $this->session->set_userdata('end_date',$end_date);
        $data['com']=$this->data_model->companyactivity($start_date,$end_date);
        if($this->form_validation->run()==TRUE){
            
            $this->load->view('companyavgactivity_view',$data);
        }else{
            $this->load->view('companyavgactivity_view',$data);
        }
    }else{
        $start_date=$this->input->post('start_date');
        $end_date=$this->input->post('end_date');
        $data['com']=$this->data_model->companyactivity($start_date,$end_date);
        $this->load->view('companyavgactivity_view',$data);
    }

}
public function stationreport(){
    if(isset($_POST['station_submit'])){
        $this->form_validation->set_rules('date','date','required');
        $date=$this->input->post('date');
        $this->session->set_userdata('date',$date);
        $data['st']=$this->data_model->station($date);
        if($this->form_validation->run()==TRUE){
            $this->load->view('stationreport_view',$data);
        }else{
            $this->load->view('stationreport_view',$data);
        }
    }else{
        $date=$this->input->post('date');
        $data['st']=$this->data_model->station($date);
        $this->load->view('stationreport_view',$data);
    }
}
public function act(){ 
    if(isset($_POST['act_submit'])){
        $this->form_validation->set_rules('date','date','required');
        $date=$this->input->post('date');
        $this->session->set_userdata('date',$date);
        $data=$this->data_model->selectacivity();
        $this->load->view('activityreport_view');
        if($this->form_validation->run()==TRUE){
            foreach($data as $emp){
            
                $data1['act']=$this->data_model->activityfetchdata($date,$emp->activity);
                $this->load->view('activity_table',$data1);
            }
            $this->load->view('footer');
        }else{
            foreach($data as $emp){ 
            
                $data1['act']=$this->data_model->activityfetchdata($date,$emp->activity);
                $this->load->view('activity_table',$data1);
            }
            $this->load->view('footer');
        }
    }else{
        $data['act1']=$this->data_model->selectacivity();
        $this->load->view('activityreport_view');
        $this->load->view('activity_table',$data);
        $this->load->view('footer');
        
    }
}
public function order_p(){
    if(isset($_POST['order_submit'])){
        $this->form_validation->set_rules('ordernumber','order','required');
        $order=$this->input->post('ordernumber');
        $this->session->set_userdata('ordernum',$order);
        $data['order1']=$this->data_model->select();
        $data['order2']=$this->data_model->orderplan($order);
        if($this->form_validation->run()==TRUE){
            $this->load->view('order_plan',$data);
        }else{
            $this->load->view('order_plan',$data);
        }
    }else{
        $order=$this->input->post('ordernumber');
        $data['order1']=$this->data_model->select();
        $data['order2']=$this->data_model->orderplan($order);

        $this->load->view('order_plan',$data);
    }
}
public function stationplan(){
    if(isset($_POST['station_submit'])){  
        $this->form_validation->set_rules('station_date','date','required');
        $station_date=$this->input->post('station_date');
        $this->session->set_userdata('date',$station_date);
        $data=$this->data_model->stations();
        $this->load->view('stationplanview');
        if($this->form_validation->run()==TRUE){
            foreach($data as $st){
                $data1['sta']=$this->data_model->station_plan($station_date,$st->station);
                $this->load->view('station_table',$data1);
            }
            $this->load->view('footer');
        }else{
            foreach($data as $st){ 
            
                $data1['sta']=$this->data_model->station_plan($station_date,$st->station);
                $this->load->view('station_table',$data1);
            }
            $this->load->view('footer');
        }
    }else{
        $data2['sta1']=$this->data_model->stations();
        $this->load->view('stationplanview');
        $this->load->view('station_table',$data2);
        $this->load->view('footer');
    }  
}
public function selectorder(){
    $station=$this->input->post('state');
    $data1=$this->data_model->selectordernum($station);
    if(count($data1)>0){
        $box='';
        $box .='<option>select ordernum</option>';
        foreach($data1 as $d){
            $box .='<option value="'.$d->ordernum.'">'.$d->ordernum.'</option>';
        }
        
    }
    echo $box;
}
public function selectactivity(){
    $station=$this->input->post('state1');
    $stat=$this->settings_model->selectid($station);
    $id=0;
    foreach($stat as $s){
        $id=$s->id;
    }
    $data=$this->data_model->selactivity($id);
    if(count($data)>0){
        $box='';
        $box .='<option>select ordernum</option>';
        foreach($data as $d){
            $box .='<option value="'.$d->activity.'">'.$d->activity.'</option>';
        }
        
    }
    echo $box;
}
public function insert(){
   

        $station=$this->input->post('station');
        $order=$this->input->post('order');
        $activity=$this->input->post('activity');
        $worker=$this->input->post('worker');
        $tmqrd=$this->input->post('tmrqd');
        $weiin=$this->input->post('weiin');
        $date=$this->input->post('date');
        $time=$this->input->post('time');
        $this->data_model->dailyinsert($station,$order,$activity,$worker,$tmqrd,$weiin,$date,$time);
        $this->data_model->detailsinsert($station,$order,$activity,$worker,$tmqrd,$weiin,$date,$time);

        redirect(base_url().'data/daily','refresh');


}
}   