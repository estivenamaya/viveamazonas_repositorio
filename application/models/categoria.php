<?php

/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 16/05/2016
 * Time: 04:02 PM
 */
class categoria extends CI_Model
{
    function __construct()
    {
        parent::__construct();

        $this->load->database();
    }

    /* Metodo para añadir una nueva categoria de contenido */

    function agregarCategoria($data){
        if ($this->db->insert('categorias', $data)){
            $last_id = $this->obtenerUltimaCategoria();
            return $last_id;
        }else{
            return false;
        }

    }

    function modifyCategory($data){
        $id = $data['id_categoria'];
        if($this->db->update('categorias', $data, array('id_categoria' => $id))){
            return true;
        }else{
            return false;
        }
    }

    function obtenerCategoriasPorId($id_padre){

        if($id_padre == -1){
            $this->db->from('categorias');
        }else{
            $this->db->from('categorias');
            $this -> db -> where('id_padre',$id_padre);
        }
        $this -> db -> order_by('nombre', 'asc');
        $result = $this -> db ->get();
        return $result->result_array();
    }

    

    function obtenerUltimaCategoria(){
        $this->db->from('categorias');
        $this->db->order_by("id_categoria", "desc");
        $this->db->limit(1);
        $result = $this -> db ->get();
        return $result->result_object();
    }

    function eliminarCategoria($id_categoria){
        if ($this->db->delete('categorias', array('id_categoria' => $id_categoria))){
            return true;
        }else{
            return false; 
        }
    }
}