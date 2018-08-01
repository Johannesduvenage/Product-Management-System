<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
    class Login_model extends CI_Model{
        public function checkdata($user){
            $result=$this->db->query("select * from users where username='$user'");
            if($result->num_rows()==1){
                return $result->row_object();
            }else{
                return FALSE;
            }
        }
    }
?> 