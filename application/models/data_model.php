<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class data_model extends CI_Model{
    public function dailyplan($date){
       $q=$this->db->query("select * from details where startdate='$date' and wei_in >'0'");
       if($q->num_rows()>0){
        return $q->result();
    }else{
        return FALSE;
    }
    }
    public function orderplan($order){
        $q=$this->db->query("select * from details where ordernum='$order'");
        if($q->num_rows()>0){
         return $q->result();
     }else{
         return FALSE;
     }
     }
     public function select()
	{ 
        $this->load->database();
        $query = $this->db->query('SELECT ordernum FROM orders');
        if($query->num_rows()>0){ 
            return $query->result();
        }
    } 
    public function monthlyreport($start_date,$end_date){
        $q=$this->db->query("select * from details where startdate between '$start_date' and '$end_date' and wei_in >'0'");
        if($q->num_rows()>0){
         return $q->result();
     }
     else{
         return False;
     }
     }
     public function dailyreport($date){
        $q=$this->db->query("select activity,SUM(grams) as g,SUM(wei_in) as i,SUM(wei_out) as o from details where startdate='$date' and wei_out > '0' GROUP by activity");
        if($q->num_rows()>0){
         return $q->result();
     }else{
         return FALSE;
     }
     }
     public function employeereport(){
        $s=$this->db->query("select * from employees");
        return $s->result();
     }

     public function empdatafetch($start_date,$end_date,$emp){
         $s=0;
        $query=$this->db->query("select worker,activity,grams,starttime,end_time,TIMESTAMPDIFF(MINUTE,starttime,end_time) AS MinuteDiff from details where worker='$emp' AND wei_out>'$s' and startdate between '$start_date' and '$end_date' ");
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return False;
        }
     }
     public function employeeactivity_report(){
         $query=$this->db->query("select startdate,grams,worker,activity,wei_in,wei_out,starttime,end_time,TIMESTAMPDIFF(MINUTE,starttime,end_time) AS MinuteDiff from details where wei_out > '0'");
         if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return False;
        }
     } 
     public function companyactivity($start_date,$end_date){
        $query=$this->db->query("select activity,AVG(grams) AS a,MIN(grams) AS m,MAX(grams) AS o FROM details  where startdate between '$start_date' and '$end_date' and wei_out > '0' GROUP BY activity");
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return False;
        }
    }
    public function station($date){
        $query=$this->db->query("select station,SUM(grams) AS a FROM details where startdate='$date' GROUP BY station");
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return False;
        }
    }
    public function selectacivity(){
        $s=$this->db->query("select * from activities");
        return $s->result();
    }
    public function activityfetchdata($date,$act){
        $query=$this->db->query("select activity,worker,grams,TIMESTAMPDIFF(MINUTE,starttime,end_time) AS time FROM details WHERE activity='$act' and startdate='$date' and  wei_out > '0'");
        if($query->num_rows()>0){ 
            return $query->result();
        }
        else{
            return False;
        } 
    }
    public function station_plan($date,$station){
        $status=1;
        $query=$this->db->query("select * from details WHERE startdate <='$date' and  status!='$status' and station='$station' and wei_in>'0'");
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return False;
        }
    }
    public function stations(){
        $query=$this->db->query("select * from stations");
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return False;
        }
    }
    public function selectstation(){
        $date=date("Y-m-d");
        $query=$this->db->query("select distinct station from details where status='0' and startdate<='$date'");
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return False;
        }
    }
    public function selectordernum($station){
        $date=date("Y-m-d");
        $query=$this->db->query("select distinct ordernum from details where status='0' and startdate<='$date' and station='$station'");
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return False;
        }
    }
    public function selactivity($id){
        $query=$this->db->query("select * from activities where id='$id'");
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return False;
        }
    }
    public function selectworker(){
        $s=0;
        $query=$this->db->query("select employee from employees where employee NOT IN (select worker from details where wei_out='$s')");
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return False;
        }
    }   
    public function dailyinsert($station,$order,$activity,$worker,$tmqrd,$weiin,$date,$time){
        $time1=$date.' '.$time;
        $user=$this->session->userdata('userid');
        $id=$order.'-'.$station.'-'.$activity.'-'.$date.'-'.$time;
        $id = str_replace(' ','_',$id);
        $id = str_replace('/','_',$id);      
        $this->db->query("insert into dailyplan(station,ordernum,startdate,starttime,worker,activity,wei_in,id,user,timerqrd) values ('$station','$order','$date','$time1','$worker','$activity','$weiin','$id','$user','$tmqrd')");
       
    }
    public function detailsinsert($station,$order,$activity,$worker,$tmqrd,$weiin,$date,$time){
        $time1=$date.' '.$time;
        $user=$this->session->userdata('userid');
        $id=$order.'-'.$station.'-'.$activity.'-'.$date.'-'.$time;
        $id = str_replace(' ','_',$id);
        $id = str_replace('/','_',$id);      
        $this->db->query("insert into details(station,ordernum,startdate,starttime,worker,activity,wei_in,id,user) values ('$station','$order','$date','$time1','$worker','$activity','$weiin','$id','$user')");
    }
    public function selectdaily(){
        $date=date("Y-m-d");
        $query=$this->db->query("select * from dailyplan where startdate='$date'");
        if($query->num_rows()>0){
            return $query->result();
        }
        else{
            return False;
        }
    }
       
}
?>