<?php
class Model_alumnos extends CI_Model
{
    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Obtiene los registros de alumnos
     * @return array [Arreglo de objetos con datos de alumnos]
     */
    public function getAlumnos()
    {
        $query = $this->db->get('alumno');
        return $query->result();
    }

    /**
     * Obtiene un registro de alumno por ID
     * @param int $id [ID del alumno]
     * @return object [Objeto con los datos del alumno]
     */
    public function getAlumnoById($id)
    {
        $this->db->where('alumno', $id);  // Assuming 'alumno' is the primary key
        $query = $this->db->get('alumno');
        return $query->row();
    }

    /**
     * Elimina un registro de alumno por ID
     * @param int $id [ID del alumno]
     * @return bool [Resultado de la eliminación]
     */
    public function delete($id)
    {
        $this->db->where('alumno', $id);  // Assuming 'alumno' is the primary key
        return $this->db->delete('alumno');
    }

    /**
     * Crea un nuevo registro de alumno
     * @param array $datos [Datos del alumno]
     * @return bool [Resultado de la inserción]
     */
    public function create($datos)
    {
        return $this->db->insert('alumno', $datos);
    }

    /**
     * Actualiza un registro de alumno por ID
     * @param int $id [ID del alumno]
     * @param array $datos [Datos del alumno]
     * @return bool [Resultado de la actualización]
     */
    public function update($id, $datos)
    {
        $this->db->where('alumno', $id);  // Assuming 'alumno' is the primary key
        return $this->db->update('alumno', $datos);
    }
} // Ensure this closing bracket is present and correct
