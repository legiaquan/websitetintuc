<?php 
/**
 * 
 */
class Login_model extends CI_Model
{
	
	function Check_login($username, $password)  
	{  
	   $this->db->where('id_admin', $username);  
	   $this->db->where('password', $password);  
	   $query = $this->db->get('admin');  
	   if($query->num_rows() > 0)  
	   {  
	        return true;  
	   }  
	   else  
	   {  
	        return false;       
	   }  
	}
}