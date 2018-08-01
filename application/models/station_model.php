<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class station_model extends CI_Model{

    public function fetch(){
        $query=$this->db->query('select * from stations order by id');
        
        if($query->num_rows()>0){ 
            return $query->result();
        }
        else{
            false;
        } 
    }

    public function fetchstatus($ordernum){
        $query=$this->db->query("SELECT DISTINCT station,status from details WHERE ordernum='$ordernum'");
        if($query->num_rows()>0){ 
            return $query->result();
        } 
        else{
            false;
        } 
    }
    public function updatestatus($station,$ordernum){
        $id=$ordernum.'-'.$station;
        $status=0;
        $user=$this->session->userdata('userid');
        $this->db->query("insert into details(station,startdate,ordernum,id,status,user) values ('$station',CURDATE(),'$ordernum','$id',$status,'$user')");
    }

    public function display($station,$ordernum,$status){
        $query=$this->db->query("select * from details where ordernum='$ordernum' and station='$station'");
        if($query->num_rows()>0){
            $this->db->query("update details set status='$status' where ordernum='$ordernum' and station='$station'");
        }
        else{
            $id=$ordernum.'-'.$station;
            $user=$this->session->userdata('userid');
            $this->db->query("insert into details(station,startdate,ordernum,id,status,user) values ('$station',CURDATE(),'$ordernum','$id',$status,'$user')");
        }

    }
    public function insert($quan){
        $order=$this->session->userdata('ordernum');
        $this->db->query("update orders set quan='$quan' where ordernum='$order'"); 
        if($this->db->affected_rows()==1){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function selectquan(){
        $order=$this->session->userdata('ordernum');
        $query=$this->db->query("select * from orders where ordernum='$order'");
        if($query->num_rows()>0){ 
            return $query->result();
        } 
        else{
            false;
        } 
    }
}
?>