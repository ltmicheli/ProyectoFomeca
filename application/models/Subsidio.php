<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subsidio extends CI_Model
{
    protected $table = 'subsidio';

    protected $primaryKey = 'id';

    protected $cuit = 'cuitPersona';

    protected $subsidio = 'subsidio';

    protected $gastoCapital = 'gastoCapital';

    protected $gastoCorriente = 'gastoCorriente';

    protected $proyecto = 'proyecto';

    protected $contraparte = 'contraparte';

    protected $numeroLinea = 'numeroLinea';

    protected $presupuesto = 'presupuesto';

    protected $fechaPresentacion = 'fechaPresentacion';

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
        date_default_timezone_set('America/Argentina/Buenos_Aires');
        $fecha = date('Y-m-d H:i:s');
        $this->db->set($this->cuit, $this->input->post('cuit') );
        $this->db->set($this->subsidio, $this->input->post('gastosSubsidioResumenGeneral') );
        $this->db->set($this->gastoCapital, $this->input->post('gastosCapitalResumenGeneral'));
        $this->db->set($this->gastoCorriente, $this->input->post('gastosCorrientesResumenGeneral'));
        $this->db->set($this->proyecto, $this->input->post('proyectoResumen'));
        $this->db->set($this->contraparte, $this->input->post('gastosContraparteResumenGeneral'));
      //  $this->db->set($this->numeroLinea, $this->input->post('gastosContraparteResumenGeneral'));//ver como hacerlooooo
        $this->db->set($this->presupuesto, $this->input->post('totalRespaldadoPresupuestos'));
        $this->db->set($this->fechaPresentacion, $fecha );
        $estado = $this->db->insert($this->table);
        if ($estado > 0) {
          $estado = $this->db->insert_id($this->table);
          return $estado;
        }
        return $estado;
    }
    public function setLinea($linea)
    {
        //datos personales
        $this->db->set($this->numeroLinea, $linea );
    }

    public function maxId()
    {
      return $this->db->insert_id();
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
