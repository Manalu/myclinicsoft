<?php 
require_once APPPATH. 'modules/secure/controllers/Secure.php';

class Locations extends Secure
{

    function __construct() {
        parent::__construct();
    }

    function _remap($method, $params = array()) {
        if (method_exists($this, $method)) {
            return call_user_func_array(array($this, $method), $params);
        }
        $directory = getcwd();
        $class_name = get_class($this);
        $this->display_error_log($directory, $class_name, $method);
    }

    public function index() {

        $this->manage();
    }

    function manage() {

        $data['data_'] = $this->Currency->get_all();

        $data['title'] = 'Currency';
        $this->template->set_template('admin');
        //$this->_main_assets();
        $this->template->write('title', $data['title']);
        $this->template->write('description', '');

        $this->template->write_view('header', 'admin_sections/header');
        $this->template->write_view('sidebar', 'admin_sections/sidebar');
        $this->template->write_view('content', 'admin/modules/currencies/manage', $data, TRUE);
        $this->template->write_view('footer', 'admin_sections/footer');
        $this->template->render();
    }

    function add_edit($id) {

        $this->form_validation->set_rules('title', ' title', 'trim|required|xss_clean');
        $this->form_validation->set_rules('code', ' code', 'trim|required|xss_clean');
        $this->form_validation->set_rules('symbol', ' symbol', 'trim|required|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $data['selected_status'] = $this->input->post('status');

            $data['currency_info'] = $this->Currency->get_info($id);

            $data['title'] = 'Add currency';
            $this->template->set_template('admin');
            //$this->_form_assets();
            $this->template->write('title', $data['title']);
            $this->template->write('description', '');
            $this->template->write_view('header', 'admin_sections/header');
            $this->template->write_view('sidebar', 'admin_sections/sidebar');
            $this->template->write_view('content', 'admin/modules/currencies/form', $data, TRUE);
            $this->template->write_view('footer', 'admin_sections/footer');
            $this->template->render();
        } else {

            $data = array(
                'cur_title' => $this->input->post('title'),
                'cur_code' => $this->input->post('code'),
                'cur_symbol' => $this->input->post('symbol'),
                'cur_position' => $this->input->post('position'),
                'cur_decimal_place' => $this->input->post('decimal_places'),
                'cur_value' => $this->input->post('value'),
                'cur_status' => $this->input->post('status')
            );

            if ($this->Currency->save($data, $id)) {

                $this->session->set_flashdata('alert_success', 'Currency ' . $data['cur_title'] . ' successfully added');
                redirect('admin/currencies/');
            } else {

                $this->session->set_flashdata('alert_error', 'Error saving data.Please check data provided');
                redirect('admin/currencies/' . $id);
            }
        }
    }

    function delete($id) {

        if ($this->Currency->delete($id)) {

            $this->session->set_flashdata('alert_success', 'Deleted successsfully!');
            redirect('admin/currencies/');
        } else {

            $this->session->set_flashdata('alert_error', 'Unebale to delete this data');
            redirect('admin/currencies/' . $id);
        }
    }

    function update($id, $state) {

        if ($this->Currency->update($id, $state)) {
            $this->session->set_flashdata('alert_success', 'Update successsfully!');
            redirect('admin/currencies/');
        } else {

            $this->session->set_flashdata('alert_error', 'Unebale to update this data');
            redirect('admin/currencies/' . $id);
        }
    }

    function get_location_type() {
        $id = $this->input->post('id', TRUE);
        $location_type = $this->input->post('type', TRUE);

        $location_types = $this->location_lib->get_types($location_type, $id);

        $output = null;

        foreach ($location_types->result() as $row) {
            $output .= "<option value='" . $row->location_id . "'>" . $row->name . "</option>";
        }

        echo $output;
    }

    function get_locations($type) {
        $id = $this->input->post('id', TRUE);
        $selected_id = $this->input->post('selected_id', TRUE);
        $location_type = $this->input->post('location_type', TRUE);
        $location_types = $this->location_lib->get_types($location_type, $id);
        echo json_encode($location_types->result());
    }
	
	
	
	function populate_state(){
		echo json_encode($this->location_lib->populate_states($this->input->post('id'))->result());
	}
	
	function populate_citie(){
		echo json_encode($this->location_lib->populate_cities($this->input->post('id'))->result());
	}
	
	
	
	
}
