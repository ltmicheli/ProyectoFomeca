<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Persona extends CI_Model
{
    protected $table = 'persona';

    protected $primaryKey = 'id';

    protected $razonSocial = 'razonSocial';

    protected $nombreFantasia = 'nombreFantasia';

    protected $cuit = 'cuit';

    protected $tipoPersona = 'tipoPersona';

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
    public function set()
    {
        //datos personales
        $this->db->set($this->razonSocial, $this->input->post('razonSocial') );
        $this->db->set($this->nombreFantasia, $this->input->post('nombreFantasia') );
        $this->db->set($this->cuit, $this->input->post('cuit'));

        if ($this->input->post('tipoPersona') == 'organizaciones') {
          $tipoPersonaPost = 1;
        }
        else {
          $tipoPersonaPost = 2;
        }
        $this->db->set($this->tipoPersona, $tipoPersonaPost);

        return $this->db->insert($this->table);
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

/* End of file Usuario.php */
/* Location: ./application/models/Usuario.php */
