<?php
class City_model extends CI_Model
{
    public function get_cities_by_province($province_id)
    {
        return $this->db->get_where('city', ['province_id' => $province_id])->result();
    }

    public function insert_city($data)
    {
        return $this->db->insert('city', $data);
    }

    public function get_all_cities()
    {
        return $this->db->get('city')->result();
    }
}
