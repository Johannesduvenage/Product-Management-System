<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class barcode_model extends CI_Model{

    public function retrive(){
        $this->load->database();
        $query=$this->db->query("select ordernum from orders");
        if($query->num_rows()>0){ 
            return $query->result();
        }
    }
    public function insertion($type,$color,$length,$extenstion,$size,$order){
        $this->load->database();
        $this->db->query("update orders set type='$type',color='$color',length='$length',extenstion='$extenstion',size='$size' where ordernum='$order'");
    }

    public function retrivedetails($order){
        $this->load->database();
        $query=$this->db->query("select * from orders where ordernum='$order'");
        if($query->num_rows()>0){ 
            return $query->result();
        }
    }
}
?>