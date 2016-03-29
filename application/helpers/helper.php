<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function yourHelperFunction(){
        $ci=& get_instance();
        $ci->load->database(); 

       /* $sql = "select * from table"; 
        $query = $ci->db->query($sql);
        $row = $query->result();*/

        return $val='hello ok';
   }

?>