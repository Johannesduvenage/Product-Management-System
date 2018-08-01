<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class edit_model extends CI_Model
{
	public function select($id)
	{
        $this->load->database();
        $query = $this->db->query("SELECT * FROM details where id='$id'");
        if($query->num_rows()>0){ 
            return $query->result();
        }
    }

    public function update($worker,$grams,$lenin,$lenout,$weiin,$weiout,$id,$start_date,$start_time,$end_date,$end_time){
        $this->load->database();
        $time1=$start_date.' '.$start_time;
        $time2=$end_date.' '.$end_time;

        $query = $this->db->query("UPDATE details set worker='$worker',grams='$grams',len_in='$lenin',len_out='$lenout',wei_in='$weiin',wei_out='$weiout',starttime='$time1',end_time='$time2',startdate='$start_date'  where id='$id'");   
    }

    public function fetchworkers(){  
        $this->load->database();
        $query=$this->db->query("select * from employees");
        return $query->result();
    }
}
?> 