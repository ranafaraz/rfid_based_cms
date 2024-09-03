<?php
class Province_model extends CI_Model
{
    public function get_provinces_by_country($country_id)
    {
        return $this->db->get_where('province', ['country_id' => $country_id])->result();
    }

    public function insert_province($data)
    {
        return $this->db->insert('province', $data);
    }

    public function get_all_provinces()
    {
        return $this->db->get('province')->result();
    }
}
