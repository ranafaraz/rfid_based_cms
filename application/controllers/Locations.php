<?php
class Locations extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Country_model');
        $this->load->model('Province_model');
        $this->load->model('City_model');
    }

    // Country CRUD
    public function countries()
    {
        $data['countries'] = $this->Country_model->get_all_countries();
        $this->load->view('locations/countries/index', $data);
    }

    public function create_country()
    {
        $this->load->view('locations/countries/create');
    }

    public function store_country()
    {
        $data = ['name' => $this->input->post('name')];
        $this->Country_model->insert_country($data);
        redirect('countries');
    }

    // Province CRUD
    public function provinces()
    {
        $data['provinces'] = $this->Province_model->get_all_provinces();
        $this->load->view('locations/provinces/index', $data);
    }

    public function create_province()
    {
        $data['countries'] = $this->Country_model->get_all_countries();
        $this->load->view('locations/provinces/create', $data);
    }

    public function store_province()
    {
        $data = [
            'name' => $this->input->post('name'),
            'country_id' => $this->input->post('country_id')
        ];
        $this->Province_model->insert_province($data);
        redirect('provinces');
    }

    // City CRUD
    public function cities()
    {
        $data['cities'] = $this->City_model->get_all_cities();
        $this->load->view('locations/cities/index', $data);
    }

    public function create_city()
    {
        $data['provinces'] = $this->Province_model->get_all_provinces();
        $this->load->view('locations/cities/create', $data);
    }

    public function store_city()
    {
        $data = [
            'name' => $this->input->post('name'),
            'province_id' => $this->input->post('province_id')
        ];
        $this->City_model->insert_city($data);
        redirect('cities');
    }

    public function create_location()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Insert Country
            $country_data = ['name' => $this->input->post('country_name')];
            $this->Country_model->insert_country($country_data);
            $country_id = $this->db->insert_id(); // Get the inserted country ID

            // Insert Province
            $province_data = [
                'name' => $this->input->post('province_name'),
                'country_id' => $country_id
            ];
            $this->Province_model->insert_province($province_data);
            $province_id = $this->db->insert_id(); // Get the inserted province ID

            // Insert City
            $city_data = [
                'name' => $this->input->post('city_name'),
                'province_id' => $province_id
            ];
            $this->City_model->insert_city($city_data);

            // Redirect after successful insertion
            redirect('locations/create_location');
        } else {
            $this->load->view('locations/create_location');
        }
    }
}
