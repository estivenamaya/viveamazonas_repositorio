<?php

/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 16/05/2016
 * Time: 03:50 PM
 */
class categorias extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('categoria');

    }

    /* --------------------------------------------------------------------
	Metodo para añadir una nueva categoria.

	@param $_REQUEST["category_n"]: recibe el nombre de la categoria que se va a crear,
    @param $_REQUEST["category_f"]: recibe el ID de la categoria padre (a la cual va a partenecer), el valor 0 se asigna a categorias principales.
	----------------------------------------------------------------------- */
    function agregarCategoria(){
        $category_n = $_REQUEST["category_n"];
        $category_f = $_REQUEST["category_f"];

        $data = array(
            'id_categoria' => 'null' ,
            'nombre' => $category_n,
            'id_padre' => $category_f,
            'estado' => '1'
        );

        $response = $this->categoria->agregarCategoria($data);

        echo ($response[0]->id_categoria);

    }
    /* ------------------------ FIN agregarCategoria -------------------- */


    function modifyCategory($id_category, $id_father){
        $name_category = $_REQUEST['name_category'];
        $data = array(
            'id_categoria' => $id_category,
            'id_padre' => $id_father,
            'nombre' => $name_category
        );

        print_r ($this->categoria->modifyCategory($data));
    }

    /* --------------------------------------------------------------------
	Metodo que lista todas las categorias de un padre especifico
	@param $id_padre: id del padre de las categorias que se quieren listar
	----------------------------------------------------------------------- */
    function obtenerCategorias($id_padre){
        $response = $this->categoria->obtenerCategoriasPorId($id_padre);
        if (isset($_POST['type'])){
            echo json_encode($response);
        }else{
            print_r($response);
        }

    }
    /* ------------------------ FIN obtenerCategorias -------------------- */


    function eliminarCategoria($id_categoria){
        $response = $this->categoria->eliminarCategoria($id_categoria);
        print_r($response);
    }

}



