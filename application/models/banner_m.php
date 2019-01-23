<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_m extends CI_Model 
{


    function __construct()
    {        
        parent::__construct();
		
		$this->load->database();
    }


    function setBanner($data){

    	return $this->db->insert('banner', $data);

    }
 

    function modifyBanner($id_banner, $data){

    	$this->db->where('id_banner', $id_banner);

    	return $this->db->update('banner', $data);

    }


    function getBanner(){

    	$this->db->from('banner');

    	$result = $this->db->get();

    	if ($result->num_rows() > 0) {

    		return $result->row_array();

    	}

    }

}