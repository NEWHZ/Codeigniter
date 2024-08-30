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
        $this->load->model('Model_alumnos');  // Load model directly
    }

    /**
     * Carga vista principal
     */
    function index()
    {
        $this->data['resultados'] = $this->Model_alumnos->getAlumnos();
        $this->data['titulo'] = "Mantenimiento de Alumnos | Este es mi titulo";
        $this->data['vista'] = "alumno/index";
        $this->load->view('layout/partialView', $this->data);
    }

    /**
     * Carga vista formulario
     */
    public function form($id = "")
    {
        if ($id) {
            $this->data['alumno'] = $this->Model_alumnos->getAlumnoById($id);
            $this->data['accion'] = site_url('AlumnosController/update/'.$id);
            $this->data['titulo'] = "Editar Alumno";
        } else {
            $this->data['accion'] = site_url('alumnosController/create');
            $this->data['titulo'] = "Nuevo Alumno";
        }

        $this->data['vista'] = "alumno/form";
        $this->load->view('layout/partialView', $this->data);
    }

    /**
     * Recibe los datos del formulario para crear un nuevo registro
     * @return [type] [retorna vista con datos cargados en edit]
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
                $this->session->set_flashdata('eok', 'Registro creado satisfactoriamente');
            } else {
                $this->session->set_flashdata('eerror', 'Ocurrió un error al intentar crear el registro');
            }
            redirect('alumnosController');
        } else {
            $this->session->set_flashdata('eerror', 'Error al guardar el registro, contacte al administrador');
            redirect('alumnosController/form');
        }
    }
    
    /**
     * Carga el formulario para editar un alumno
     */
    public function edit($id)
    {
        $this->data['alumno'] = $this->Model_alumnos->getAlumnoById($id);
        $this->data['titulo'] = "Editar Alumno";
        $this->data['vista'] = "alumno/form";
        $this->data['accion'] = site_url('AlumnosController/update/'.$id);
        $this->load->view('layout/partialView', $this->data);
    }

    /**
     * Actualiza un registro de alumno
     */
    public function update($id)
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

            if ($this->Model_alumnos->update($id, $datos)) {
                $this->session->set_flashdata('eok', 'Registro actualizado satisfactoriamente');
            } else {
                $this->session->set_flashdata('eerror', 'Ocurrió un error al intentar actualizar el registro');
            }
            redirect('alumnosController');
        } else {
            $this->session->set_flashdata('eerror', 'Error al actualizar el registro, contacte al administrador');
            redirect('alumnosController/form/'.$id);
        }
    }

    /**
     * Elimina un registro de alumno
     */
    public function delete($id)
    {
        if ($this->Model_alumnos->delete($id)) {
            $this->session->set_flashdata('eok', 'Alumno eliminado satisfactoriamente');
        } else {
            $this->session->set_flashdata('eerror', 'Ocurrió un error al intentar eliminar el alumno');
        }
        redirect('alumnosController');
    }
}