<?php
class Model_alumnos extends CI_Model
{
    /**
     * Constructor
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Obtiene los registros de alumnos
     * @return [type] [arreglo de datos]
     */
    function getAlumnos()
    {
        $query = $this->db->get('alumno');
        return $query->result();
    }

    public function getAlumnoById($id)
    {
        $this->db->where('alumno', $id);
        $query = $this->db->get('alumno');
        return $query->row(); 
    }

    public function delete($id)
    {
        $this->db->where('alumno', $id);
        return $this->db->delete('alumno');
    }

    function create($datos)
	{
		return $this->db->insert('alumno', $datos);
	}

    public function update($id, $datos)
    {
        $this->db->where('alumno', $id);
        return $this->db->update('alumno', $datos);
    }
}
