<?
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * author: Nikollai Hernandez
 * date: 23/06/2016
 */

class Testimonios extends CI_Model{

	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	function getTestimonios(){

		$this->db->from('testimonios');
		$response = $this->db->get();

		if ($response->num_rows() > 0) {
			return $response->result_array();
		}else{
			return 0;
		}

	}

	function getLastTestimonio(){

		$this->db->from('testimonios');
		$this->db->order_by('id_testimonio', 'desc');
		$this->db->limit(1);
		$response = $this->db->get();

		if ($response->num_rows() > 0) {
			return $response->result_array();
		}else{
			return 0;
		}

	}

	function getTestimoniosById($id_testimonio){

		$this->db->from('testimonios');
		$this->db->where('id_testimonio', $id_testimonio);
		$response = $this->db->get();

		if ($response->num_rows() > 0) {
			return $response->result_array();
		}else{
			return 0;
		}

	}

	function modifyTestimonio($id_testimonio, $data){

		$this->db->where('id_testimonio', $id_testimonio);

		return $this->db->update('testimonios', $data);

	}

	function setTestimonio($data){

		$this->db->insert('testimonios', $data);

	}

	function deleteTestimonio($id_testimonio){

		$this->db->where('id_testimonio',$id_testimonio);

		if($this->db->delete('testimonios')){
			
			return 1;

		}else{

			return 0;
			
		}

	}

}