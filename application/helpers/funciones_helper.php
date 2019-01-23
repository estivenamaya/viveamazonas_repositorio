<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
//si no existe la función invierte_date_time la creamos
if(!function_exists('invierte_date_time'))
{
    //formateamos la fecha y la hora, función de cesarcancino.com
    function invierte_date_time($fecha)
    {
 
        $day=substr($fecha,8,2);
        $month=substr($fecha,5,2);
        $year=substr($fecha,0,4);
        $hour = substr($fecha,11,5);
        $datetime_format=$day."-".$month."-".$year.' '.$hour;
        return $datetime_format;
 
    }
}

if(!function_exists('imprimeSiExiste'))
{

    function imprimeSiExiste(&$var, $default = '') {
       echo isset($var) ? $var : $default;
    }
    
}

if(!function_exists('nvl'))
{

    function nvl(&$var, $default = '') {
       return isset($var) ? $var : $default;
    }
    
}

if(!function_exists('quitarEtiquetas'))
{
    /**
     * Descripcion: Omite algunas de las etiquetas HTML mas utilizadas
     * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
     * @param: String $cadena -> Recibe la cadena a la cual se le desean quitar las etiquetas
     * @return: String
     */
      function quitarEtiquetas($cadena){
          $buscar = ['<p>', '</p>', '<h1>', '</h1>', '<span>', '</span>', '&ntilde;', '&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&Ntilde;', '&Aacute;', '&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&nbsp;', '&agrave;', '&egrave;', '&igrave;', '&ograve;', '&ugrave;', '&Agrave;', '&Egrave;', '&Igrave;', '&Ograve;', '&Ugrave;'];
          $reemplazar = ['','','','','','', 'ñ', 'a', 'e', 'i', 'o', 'u', 'Ñ', 'A', 'E', 'I', 'O', 'U',' ', 'a', 'e', 'i', 'o', 'u', 'Ñ', 'A', 'E', 'I', 'O', 'U'];
          return str_replace($buscar, $reemplazar, $cadena);
      }
  // ================================================================================ //  
}


if(!function_exists('imprimirKeyValue'))
{

    /**
     * Descripcion: Imprime el valor de un key de las activades
     * @author: Nikollai Hernandez <nikollaihernandez@gmail.com>
     * @param: Array $data -> Recibe un arreglo con oda la informacion de la actividad (lenguajes)
     * @param: String $key -> Recibe el key que busca para imprimir su valo
     * @return:
     */
        function imprimirKeyValue($data, $key_string) {
            if ($data != 0) {
                foreach ($data as $key) {
                   if ($key['key_actividad'] == trim(strtolower($key_string))) {
                      return $key['value_actividad'];
                   }
                }
            }

            return '';
        }
    // ================================================================================ //
    
    
}


//Elimina una carpeta con todo su contenido
if(!function_exists('eliminarDir'))
{

  function eliminarDir($carpeta)
  {
      foreach(glob($carpeta . "/*") as $archivos_carpeta)
      {
          echo $archivos_carpeta;
   
          if (is_dir($archivos_carpeta))
          {
              eliminarDir($archivos_carpeta);
          }
          else
          {
              unlink($archivos_carpeta);
          }
      }
   
      //rmdir($carpeta);
  }

}


if(!function_exists('stringToUrl'))
{

    function stringToUrl($string) {
        $no_permitidas= array ("Ñ", "ñ", " ", "á","é","í","ó","ú","Á","É","Í","Ó","Ú","ñ","À","Ã","Ì","Ò","Ù","Ã™","Ã ","Ã¨","Ã¬","Ã²","Ã¹","ç","Ç","Ã¢","ê","Ã®","Ã´","Ã»","Ã‚","ÃŠ","ÃŽ","Ã”","Ã›","ü","Ã¶","Ã–","Ã¯","Ã¤","«","Ò","Ã","Ã„","Ã‹", "(", ")");
        $permitidas= array ('n', "n", "-", "a","e","i","o","u","a","e","i","o","u","n","n","a","e","i","o","u","a","e","i","o","u","c","c","a","e","i","o","u","a","e","i","o","u","u","o","o","i","a","e","u","i","a","e", "","");
        $texto = str_replace($no_permitidas, $permitidas ,$string);

        return strtolower($texto);
    }
    
}

if(!function_exists('cantidadCesta'))
{

    function cantidadCesta() {
        $CI = & get_instance();  //get instance, access the CI superobject
        $carro = $CI->session->userdata('carro');
        //$carro = $this->session->userdata('carro');

        $total = 0;

        if (isset($carro['producto'][0])) {
            for ($i=0; $i < count($carro['producto']); $i++) { 
                if ($carro['estado'][$i] == 1) {
                   $total++;

                   if ($carro['paquetes'][$i] != '') {
                      for ($j=1; $j <= count($carro['paquetes'][$i]); $j++) { 
                        if ($carro['paquetes'][$i][$j]['estado']) {
                          $total++;
                        }
                      }
                   }
                }
            }
        }

        return $total;
    }
    
}
 
/* 
if(!function_exists('get_users'))
{
    function get_users()
    {
        //asignamos a $ci el super objeto de codeigniter
        //$ci será como $this
        $ci =& get_instance();
        $query = $ci->db->get('usuarios');
        return $query->result();
 
    }
}
*/
//end application/helpers/ayuda_helper.php