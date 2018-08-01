<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class orderdetails_model extends CI_Model{

    public function insert($date,$time,$worker,$activity,$grams,$lenin,$weiin,$ordernum,$station){
        $this->load->database();
        $time1=$date.' '.$time;
        $user=$this->session->userdata('userid');
        $id=$ordernum.'-'.$station.'-'.$activity.'-'.$date.'-'.$time;
        $id = str_replace(' ','_',$id);
        $id = str_replace('/','_',$id);
        $this->db->query("insert into details(station,ordernum,startdate,starttime,worker,activity,grams,len_in,wei_in,id,user) values ('$station','$ordernum','$date','$time1','$worker','$activity','$grams','$lenin','$weiin','$id','$user')");
    }

    public function update($date,$time,$activity,$lenout,$weiout,$ordernum,$station,$add_emp){
        $this->load->database();
        $time1=$date.' '.$time;
        $this->db->query("update details set end_time='$time1',len_out='$lenout',wei_out='$weiout' where ordernum='$ordernum' and activity='$activity' and station='$station' and wei_out='0' and worker='$add_emp'");
    }

    public function fetch($station,$ordernum){
        $this->load->database();
        $query=$this->db->query("select * from details where ordernum='$ordernum' and station='$station' and wei_in >'0'");
        if($query->num_rows()>0){
            return $query->result();
        }
    } 

    public function fetchactivity(){
        $this->load->database();
        $query=$this->db->query("select distinct activity from activities");
        return $query->result();
    }
    public function fetchstation(){
        $this->load->database();
        $query=$this->db->query("select * from stations");
        return $query->result(); 
    }
    public function fetchworkers(){
        $this->load->database();
        $query=$this->db->query("select * from employees");
        return $query->result();
    }
}
?>