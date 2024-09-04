<?php
class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->model('Country_model');
        $this->load->model('Province_model');
        $this->load->model('City_model');
    }

    public function index()
    {
        $data['users'] = $this->User_model->get_all_users();
        $this->load->view('users/index', $data);
    }

    public function create()
    {
        $data['countries'] = $this->Country_model->get_all_countries();
        $this->load->view('users/create', $data);
    }

    public function store()
    {
        $data = [
            'name' => $this->input->post('name'),
            'country_id' => $this->input->post('country_id'),
            'province_id' => $this->input->post('province_id'),
            'city_id' => $this->input->post('city_id')
        ];
        $this->User_model->insert_user($data);
        redirect('users');
    }

    public function edit($id)
    {
        $data['user'] = $this->User_model->get_user($id);
        $data['countries'] = $this->Country_model->get_all_countries();
        $data['provinces'] = $this->Province_model->get_provinces_by_country($data['user']->country_id);
        $data['cities'] = $this->City_model->get_cities_by_province($data['user']->province_id);
        $this->load->view('users/edit', $data);
    }

    public function update($id)
    {
        $data = [
            'name' => $this->input->post('name'),
            'country_id' => $this->input->post('country_id'),
            'province_id' => $this->input->post('province_id'),
            'city_id' => $this->input->post('city_id')
        ];
        $this->User_model->update_user($id, $data);
        redirect('users');
    }

    public function delete($id)
    {
        $this->User_model->delete_user($id);
        redirect('users');
    }

    public function get_provinces_by_country($country_id)
    {
        $provinces = $this->Province_model->get_provinces_by_country($country_id);
        echo json_encode($provinces);
    }

    public function get_cities_by_province($province_id)
    {
        $cities = $this->City_model->get_cities_by_province($province_id);
        echo json_encode($cities);
    }
}
