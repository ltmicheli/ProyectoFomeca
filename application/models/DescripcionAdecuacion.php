<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DescripcionAdecuacion extends CI_Model
{
    protected $table = 'descripcionadecuacionedilicia';

    protected $primaryKey = 'id';

    protected $foreignKey = 'idAdecuacionEdilicia';

    protected $tipoDistincion = 'tipoDistincion';

    protected $descripcion = 'descripcion';

    protected $tiempo = 'tiempo';

    protected $desembolso = 'desembolso';

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    /**
     * Obtiene un usuario según su id.
     *
     * @param integer $id
     * @return array
     */
    // public function get($id)
    // {
    //     $this->db->where($this->primaryKey, $id);
    //     $exec = $this->db->get($this->table);
    //
    //     if($exec->num_rows() > 0)
    //         return $exec->result()[0];
    //
    //     return null;
    // }
    //
    // /**
    //  * Obtiene un array de todos los usuarios de la tabla.
    //  *
    //  * @return array
    //  */
    // public function getAll()
    // {
    //     $this->db->where($this->estado, true);
    //     $exec = $this->db->get($this->table);
    //
    //     return $exec->result();
    // }

    /**
     * Inserta un Usuario dentro de la tabla, los parámetros los recibe por post.
     * "Si el controlador recibe parámetros por post => el modelo tambien los tiene."
     *
     * @return boolean
     */
    public function set($idPadre)
    {
        $transmision = $this->input->post('adecuacionTransmision');
        $produccion = $this->input->post('adecuacionProduccion');
        $infra = $this->input->post('adecuacionInfra');
        //print_r ($matriz);
        foreach ($transmision as $trans) {
          $this->db->set($this->foreignKey, $idPadre );
          $this->db->set($this->tipoDistincion, 1 );
          $this->db->set($this->descripcion, $trans['desc'] );
          $this->db->set($this->tiempo, $trans['tiem'] );
          $this->db->set($this->desembolso, $trans['dese'] );
          $this->db->insert($this->table);
        }
        //print_r ($matriz);
        foreach ($produccion as $prod) {
          $this->db->set($this->foreignKey, $idPadre );
          $this->db->set($this->tipoDistincion, 2 );
          $this->db->set($this->descripcion, $prod['desc'] );
          $this->db->set($this->tiempo, $prod['tiem'] );
          $this->db->set($this->desembolso, $prod['dese'] );
          $this->db->insert($this->table);
        }
        // $this->db->set($this->foreignKey, $idPadre );
        //print_r ($matriz);
        foreach ($infra as $inf) {
          $this->db->set($this->foreignKey, $idPadre );
          $this->db->set($this->tipoDistincion, 3 );
          $this->db->set($this->descripcion, $inf['desc'] );
          $this->db->set($this->tiempo, $inf['tiem'] );
          $this->db->set($this->desembolso, $inf['dese'] );
          $this->db->insert($this->table);
        }
        // $this->db->set($this->foreignKey, $idPadre );
        // $this->db->set($this->transmision, $this->input->post('adecuacionTransmision') );
        // $this->db->set($this->produccion, $this->input->post('adecuacionProduccion') );
        // $this->db->set($this->infraestructura, $this->input->post('adecuacionInfra') );
        //
        // $estado = $this->db->insert($this->table);
        // if ($estado > 0) {
        //   $estado = $this->db->insert_id($this->table);
        //   return $estado;
        // }
        // return $estado;
    }

    /**
     * Actualiza un Usuario de la tabla, los parámetros los recibe por post.
     *
     * @return boolean
     */
    // public function update()
    // {
    //     $this->db->set($this->nombre, strtolower( trim( $this->input->post('nombre') ) ) );
    //     $this->db->set($this->apellido, strtolower( trim( $this->input->post('apellido') ) ) );
    //     $this->db->set($this->documento, trim( $this->input->post('documento') ) );
    //
    //     $this->db->where($this->primaryKey, $this->input->post('usuario_id'));
    //
    //     return $this->db->update($this->table);
    // }

    /**
     * Elimina un registro
     *
     * @param integer $id
     * @param boolean $soft
     * @return boolean
     */
    // public function delete($id, $soft = true)
    // {
    //     // "Borrado Duro" -- eliminar el registro de la base de datos.
    //     if($soft == false)
    //     {
    //         $this->db->where($this->primaryKey, $id);
    //         return $this->db->delete($this->table);
    //     }
    //     else // "Borrado Suave" -- cambia el estado del usuario.
    //     {
    //         // $this->db->set($this->estado, false);
    //         // $this->db->where($this->primaryKey, $id);
    //         //
    //         // return $this->db->update($this->table);
    //     }
    // }
}
