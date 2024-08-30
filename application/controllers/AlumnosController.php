<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AlumnosController extends CI_Controller
{
    /**
     * Controlador Alumnos
     * Descripcion: Ejemplo de mantenimiento
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_alumnos');  // Load the model directly
    }

    /**
     * Carga vista principal
     */
    public function index()
    {
        $this->data['resultados'] = $this->Model_alumnos->getAlumnos();
        $this->data['titulo'] = "Mantenimiento de Alumnos | Este es mi título";
        $this->data['vista'] = "alumno/index";
        $this->load->view('layout/partialView', $this->data);
    }

    /**
     * Carga vista formulario
     */
    public function form($alumno = "")
    {
        $this->data['titulo'] = "Mantenimiento de Alumnos";
        $this->data['vista'] = "alumno/form";
        
        if ($alumno) {
            // Load the student data to edit
            $this->data['alumno'] = $this->Model_alumnos->getAlumnoById($alumno);
            $this->data['accion'] = site_url('AlumnosController/update/' . $alumno);
        } else {
            // Default action for creating a new record
            $this->data['accion'] = site_url('AlumnosController/create');
        }

        $this->load->view('layout/partialView', $this->data);
    }

    /**
     * Recibe los datos del formulario para crear un nuevo registro
     * @return void
     */
    public function create()
    {
        if ($_POST) {
            $datos = array(
                'nombre' => $this->input->post('nombre'),
                'apellido' => $this->input->post('apellido'),
                'direccion' => $this->input->post('direccion'),
                'movil' => $this->input->post('movil'),
                'email' => $this->input->post('email'),
                'inactivo' => $this->input->post('inactivo'),
                'user' => 1
            );

            if ($this->Model_alumnos->create($datos)) {
                $this->session->set_flashdata('swal', 'insert_success');
            } else {
                $this->session->set_flashdata('swal', 'insert_error');
            }
            redirect('AlumnosController');
        } else {
            $this->session->set_flashdata('swal', 'insert_error');
            redirect('AlumnosController/form');
        }
    }

    /**
     * Actualiza un registro existente
     * @param int $alumno
     * @return void
     */
    public function update($alumno)
    {
        if ($_POST) {
            $datos = array(
                'nombre' => $this->input->post('nombre'),
                'apellido' => $this->input->post('apellido'),
                'direccion' => $this->input->post('direccion'),
                'movil' => $this->input->post('movil'),
                'email' => $this->input->post('email'),
                'inactivo' => $this->input->post('inactivo'),
                'user' => 1
            );

            if ($this->Model_alumnos->update($alumno, $datos)) {
                $this->session->set_flashdata('swal', 'update_success');
            } else {
                $this->session->set_flashdata('swal', 'update_error');
            }
            redirect('AlumnosController');
        } else {
            $this->session->set_flashdata('swal', 'update_error');
            redirect('AlumnosController/form/' . $alumno);
        }
    }

    /**
     * Elimina un registro existente
     * @param int $alumno
     * @return void
     */
    public function delete($alumno)
    {
        if ($this->Model_alumnos->delete($alumno)) {
            $this->session->set_flashdata('swal', 'delete_success');
        } else {
            $this->session->set_flashdata('swal', 'delete_error');
        }
        redirect('AlumnosController');
    }
}
