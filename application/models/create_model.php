<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    
class create_model extends CI_Model
{
	public function insert($ordernum,$items,$email)
	{
        $this->load->database();
         for($i=1;$i<=$items;$i++):
           $itemnum=sprintf("%s-%u",$ordernum,$i);
           $this->db->query("insert into orders (ordernum,item,email,startdate) values ('$itemnum','$items','$email',CURDATE())");
        endfor;
	}
}
?>