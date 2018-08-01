<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class settings_model extends CI_Model{
        public function getuser($olduser){
            $s=$this->db->query("select * from users where username='$olduser'");
            return $s->result();
        }
        public function changeuser($olduser,$newuser){
            $this->db->query("update users set username='$newuser' where username='$olduser'");
            if($this->db->affected_rows()==1){
                return true;
            }else{
                return false;
            }
        }
        public function changepass1($olduser1,$newpass){
            $this->db->query("update users set password='$newpass' where username='$olduser1'");
            if($this->db->affected_rows()==1){
                return true;
            }else{
                return false;
            }
        }
        public function changeemail($olduser1,$email){
            $this->db->query("update users set email='$email' where username='$olduser1'");
            if($this->db->affected_rows()==1){
                return true;
            }else{
                return false;
            }
        }
        public function adduser1($add_user,$add_pass,$add_email,$status){
            $this->db->query("insert into users(username,password,email,status)values('$add_user','$add_pass','$add_email',$status)");
            if($this->db->affected_rows()==1){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function addactivity($activity,$id){
            $activity=strtoupper($activity);
            $activity = str_replace(' ','_',$activity);
            $this->db->query("insert into activities(activity,id)values('$activity','$id')");
            if($this->db->affected_rows()==1){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function delactivity($activity,$id){
            $activity=strtoupper($activity);
            $this->db->query("delete from activities where activity='$activity' and id='$id'");
            if($this->db->affected_rows()==1){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function addstation($station){
            $station=strtoupper($station);
            $station = str_replace(' ','_',$station);
            $this->db->query("insert into stations(station)values('$station')");
            if($this->db->affected_rows()==1){
                return TRUE;
            }else{
                return FALSE;
            }
        } 
        public function delstation($station){
            $station=strtoupper($station);
            $this->db->query("delete from stations where station='$station'");
            if($this->db->affected_rows()==1){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function addemployee($employee){
            $employee=strtoupper($employee);
            $this->db->query("insert into employees(employee)values('$employee')");
            if($this->db->affected_rows()==1){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function delemployee($employee){
            $employee=strtoupper($employee);
            $this->db->query("delete from employees where employee='$employee'");
            if($this->db->affected_rows()==1){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function flush($start_date,$end_date){
        $this->db->query("delete from details where startdate between '$start_date' and '$end_date'");
        $this->db->query("delete from orders where startdate between '$start_date' and '$end_date'");

        }
        public function checkstation($sta){
            $sta=strtoupper($sta);
            $sta= str_replace(' ','_',$sta);
            $this->db->query("select * from stations where station='$sta'");
            if($this->db->affected_rows()==1){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function checkemployee($employee){
            $employee=strtoupper($employee);
            $this->db->query("select * from employees where employee='$employee'");
            if($this->db->affected_rows()==1){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function checkactivity($activity,$id){
            $activity=strtoupper($activity);
            $activity = str_replace(' ','_',$activity);
            $this->db->query("select * from activities where activity='$activity' and id='$id'");
            if($this->db->affected_rows()==1){
                return TRUE;
            }else{
                return FALSE;
            }
        }
        public function fetchorder(){
            $q= $this->db->query("select * from orders");
            if($q->num_rows()>0){
                return $q->result();
             }else{
                 return FALSE;
             }
        }
        public function delorder($order){
            $q= $this->db->query("delete from details where ordernum='$order'");
            $s=$this->db->query("delete from orders where ordernum='$order'");
            
        }
        public function selectid($station){
           $q= $this->db->query("select * from stations where station='$station'");
            if($q->num_rows()>0){
               return $q->result();
            }else{
                return FALSE;
            }
        }
    }