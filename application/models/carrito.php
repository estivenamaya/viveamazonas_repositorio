<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carrito extends CI_Model 
{

////////////////////////////////////////////////////////////////////////////////////////


	public $nf;
	public $carro;
	
	var $CI;
	
	function __construct(){
		parent::__construct();

		$this->load->library('session');

        if( $this->session->userdata('nf') ){
			$this->nf = $this->session->userdata('nf');
			$this->carro = $this->session->userdata('carro');

		}else
			$this->nf = 0;

	}


	function actualizarCantidadActividad($posicion, $tipo){
		if ($tipo == 1) {
			$this->carro['cantidad'][$posicion] = $this->carro['cantidad'][$posicion] + 1;
		}
		else{
			$this->carro['cantidad'][$posicion] = $this->carro['cantidad'][$posicion] - 1;
		}

		$this->sincronizar();
	}

	function actualizarCantidadPaquete($posicion, $tipo, $posicion_paquete){
		if ($tipo == 1) {
			$this->carro['paquetes'][$posicion_paquete][$posicion]['cantidad'] = $this->carro['paquetes'][$posicion_paquete][$posicion]['cantidad'] + 1;
		}
		else{
			$this->carro['paquetes'][$posicion_paquete][$posicion]['cantidad'] = $this->carro['paquetes'][$posicion_paquete][$posicion]['cantidad'] - 1;
		}

		$this->sincronizar();
	}


	/**
	 * Descripcion: Elimina un articulo de la lista de productos en el carrito
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param:
	 * @return:
	 */
		function eliminarArticulo($actividad, $paquete, $tipo){
			if ($tipo == 1) {
				$this->carro['estado'][$actividad] = 0;
				$this->carro['cantidad'][$actividad] = 0;
				$this->carro['paquetes'][$actividad] = '';
			}
			else{
				$this->carro['paquetes'][$actividad][$paquete]['estado'] = 0;
				$this->carro['paquetes'][$actividad][$paquete]['cantidad'] = 0;
			}

			$this->sincronizar();
		}
	// ================================================================================ //
	
		
	function addProducto($nombre, $id_producto, $valor_cop, $valor_usd, $cantidad, $imagen){
		
		if($this->nf == 0){
			$key = false;
		}
		elseif($this->carro['producto'] > 0){
			$key = array_search($id_producto, $this->carro['producto']);
			if($key !== false)
				if($this->carro['estado'][$key]==0){ 
					$this->carro['estado'][$key] = 1;
					$this->carro['cantidad'][$key] = 0;
				}
		}else{
			$key = false; 
		}

		$product_key = 0;

		for ($i=0; $i < count($this->carro['producto']); $i++) { 
			if ($this->carro['producto'][$i] == $id_producto) {
				$key = $i;
				$product_key = 1;
			} 
		}

		if( $product_key == 0){
			$this->carro['nombre'][$this->nf] = $nombre;
			$this->carro['producto'][$this->nf] = $id_producto;
			$this->carro['cantidad'][$this->nf] = $cantidad;
			$this->carro['precio_cop'][$this->nf] = $valor_cop;
			$this->carro['precio_usd'][$this->nf] = $valor_usd;
			$this->carro['imagen'][$this->nf] = $imagen;
			$this->carro['estado'][$this->nf] = 1;
			$this->carro['paquetes'][$this->nf] = [];
			$this->carro['nf'][$this->nf] = $this->nf;
			$this->nf++;
		}else{
			$this->carro['cantidad'][$key] = $this->carro['cantidad'][$key]+$cantidad;
			$this->carro['estado'][$key] = 1;
		}
		
		$this->sincronizar();
	}

	/**
	 * Descripcion: Agrega un paquete a una actividad comprada
	 * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
	 * @param: Array $data -> Recibe un arreglo con toda la informacion del paquete
	 * @return:
	 */
		function agregarPaquete($data){
			$carro = $this->session->userdata('carro');
			for ($i=0; $i < count($carro['nombre']); $i++) { 
				if ($carro['producto'][$i] == $data['id_actividad']) {

					$existe = false;

					if (empty($carro['paquetes'][$i])) {
						$cantidad_paquetes = 0;
					}
					else{
						$cantidad_paquetes = count($carro['paquetes'][$i]);
					}

					for ($j=1; $j <= $cantidad_paquetes; $j++) { 
						if ($carro['paquetes'][$i][$j]['id_paquete'] == $data['id_paquete']) {
							$posicion_existe = $j;
							$existe = true; 
						}
					}

					if ($existe) {
						$this->carro['paquetes'][$i][$posicion_existe]['cantidad'] = $carro['paquetes'][$i][$posicion_existe]['cantidad'] + 1;
						$this->carro['paquetes'][$i][$posicion_existe]['estado'] = 1;
					}
					else{
						if (empty($carro['paquetes'][$i])) {
							$cantidad_paquetes = 0;
						}else{
							$cantidad_paquetes = count($carro['paquetes'][$i]);
						}
						
						$datos['cantidad'] = 1;
						$datos['id_paquete'] = $data['id_paquete'];
						$datos['titulo_paquete'] = $data['titulo_planes_actividad'];
						$datos['precio_cop'] = $data['precioa_planes_actividad_cop'];
						$datos['precio_usd'] = $data['precioa_planes_actividad_usd'];
						$datos['destinos'] = $data['destino_planes_actividad'];
						$datos['estado'] = 1;

						$this->carro['paquetes'][$i][$cantidad_paquetes + 1] = $datos;
					}

					$this->sincronizar();

					return '1';

				}

			}

			return '0';
		}
	// ================================================================================ //
	
	public function updateProducto( $nf, $cantidad, $estado = 1 ){
		if($cantidad === 0)
			$estado = 0;
			
		if($cantidad !== false) $this->carro['cantidad'][$nf] = $cantidad;
		if($estado !== false) $this->carro['estado'][$nf] = $estado;
		$this->sincronizar();
	}
	
	public function numProductos(){
		$num=0;
		for($p =0; $p<$this->nf; $p++)
				if(nvl($this->carro['estado'][$p]))
					$num++;
		return $num; 
	}
	
	
	public function numCompras(){
		return $this->nf;
	}

	
    public function destruirCarrito(){
    	$this->session->unset_userdata(array('carro' => '','nf' => '' ));

	}

	
	public function sincronizar(){
		$this->session->set_userdata(array('carro' => $this->carro,'nf' => $this->nf ));
	}
	
	
/////////////////////////////fin////////////////////////////////////////////////////////

	

	
}


