<?php
class User_model extends CI_Model
{
    public function get_all_users()
    {
        $this->db->select('users.*, country.name as country_name, province.name as province_name, city.name as city_name');
        $this->db->from('users');
        $this->db->join('country', 'users.country_id = country.id');
        $this->db->join('province', 'users.province_id = province.id');
        $this->db->join('city', 'users.city_id = city.id');
        return $this->db->get()->result();
    }

    public function insert_user($data)
    {
        return $this->db->insert('users', $data);
    }

    public function get_user($id)
    {
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function update_user($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('users', $data);
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('users');
    }
}
