<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Things extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('things_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $things = $this->things_model->get_all();

        $data = array(
            'things_data' => $things
        );

        $this->load->view('things_list', $data);
    }

    public function read($id) 
    {
        $row = $this->things_model->get_by_id($id);
        if ($row) {
            $data = array(
		'thg_id' => $row->thg_id,
		'thg_title' => $row->thg_title,
		'tgh_description' => $row->tgh_description,
		'tgh_image' => $row->tgh_image,
		'tgh_geo' => $row->tgh_geo,
		'tgh_address' => $row->tgh_address,
		'tgh_popularity' => $row->tgh_popularity,
		'tgh_tty_id' => $row->tgh_tty_id,
		'tgh_created_at' => $row->tgh_created_at,
	    );
            $this->load->view('things_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('things'));
        }
    }
    
    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('things/create_action'),
	    'thg_id' => set_value('thg_id'),
	    'thg_title' => set_value('thg_title'),
	    'tgh_description' => set_value('tgh_description'),
	    'tgh_image' => set_value('tgh_image'),
	    'tgh_geo' => set_value('tgh_geo'),
	    'tgh_address' => set_value('tgh_address'),
	    'tgh_popularity' => set_value('tgh_popularity'),
	    'tgh_tty_id' => set_value('tgh_tty_id'),
	    'tgh_created_at' => set_value('tgh_created_at'),
	);
        $this->load->view('things_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'thg_title' => $this->input->post('thg_title',TRUE),
		'tgh_description' => $this->input->post('tgh_description',TRUE),
		'tgh_image' => $this->input->post('tgh_image',TRUE),
		'tgh_geo' => $this->input->post('tgh_geo',TRUE),
		'tgh_address' => $this->input->post('tgh_address',TRUE),
		'tgh_popularity' => $this->input->post('tgh_popularity',TRUE),
		'tgh_tty_id' => $this->input->post('tgh_tty_id',TRUE),
		'tgh_created_at' => $this->input->post('tgh_created_at',TRUE),
	    );

            $this->things_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('things'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->things_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('things/update_action'),
		'thg_id' => set_value('thg_id', $row->thg_id),
		'thg_title' => set_value('thg_title', $row->thg_title),
		'tgh_description' => set_value('tgh_description', $row->tgh_description),
		'tgh_image' => set_value('tgh_image', $row->tgh_image),
		'tgh_geo' => set_value('tgh_geo', $row->tgh_geo),
		'tgh_address' => set_value('tgh_address', $row->tgh_address),
		'tgh_popularity' => set_value('tgh_popularity', $row->tgh_popularity),
		'tgh_tty_id' => set_value('tgh_tty_id', $row->tgh_tty_id),
		'tgh_created_at' => set_value('tgh_created_at', $row->tgh_created_at),
	    );
            $this->load->view('things_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('things'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('thg_id', TRUE));
        } else {
            $data = array(
		'thg_title' => $this->input->post('thg_title',TRUE),
		'tgh_description' => $this->input->post('tgh_description',TRUE),
		'tgh_image' => $this->input->post('tgh_image',TRUE),
		'tgh_geo' => $this->input->post('tgh_geo',TRUE),
		'tgh_address' => $this->input->post('tgh_address',TRUE),
		'tgh_popularity' => $this->input->post('tgh_popularity',TRUE),
		'tgh_tty_id' => $this->input->post('tgh_tty_id',TRUE),
		'tgh_created_at' => $this->input->post('tgh_created_at',TRUE),
	    );

            $this->things_model->update($this->input->post('thg_id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('things'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->things_model->get_by_id($id);

        if ($row) {
            $this->things_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('things'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('things'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('thg_title', ' ', 'trim|required');
	$this->form_validation->set_rules('tgh_description', ' ', 'trim|required');
	$this->form_validation->set_rules('tgh_image', ' ', 'trim|required');
	$this->form_validation->set_rules('tgh_geo', ' ', 'trim|required');
	$this->form_validation->set_rules('tgh_address', ' ', 'trim|required');
	$this->form_validation->set_rules('tgh_popularity', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('tgh_tty_id', ' ', 'trim|required|numeric');
	$this->form_validation->set_rules('tgh_created_at', ' ', 'trim|required');

	$this->form_validation->set_rules('thg_id', 'thg_id', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

};

/* End of file Things.php */
/* Location: ./application/controllers/Things.php */