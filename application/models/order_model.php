<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class order_model extends CI_Model
{
	public function select()
	{
        $this->load->database();
        $query = $this->db->query('SELECT ordernum FROM orders');
        if($query->num_rows()>0){ 
            return $query->result();
        }
    }
}
?>