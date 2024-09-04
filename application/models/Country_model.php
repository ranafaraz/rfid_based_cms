<?php
class Country_model extends CI_Model
{
    public function get_all_countries()
    {
        return $this->db->get('country')->result();
    }

    public function insert_country($data)
    {
        return $this->db->insert('country', $data);
    }
}
