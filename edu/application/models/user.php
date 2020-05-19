<?php

class user extends CI_Model
{
    public function getUser($id = null)
    {
        if ($id == null) {
            $this->db->select('*');
            return $this->db->get('users')->result_array();
        } else {
            $this->db->select('*');
            // $this->db->join('teachers', 'courses.id_teacher = teachers.id');
            return $this->db->get_where('users', ['users.id' => $id])->result_array();
        }
    }

    public function deleteUser($id)
    {
        $this->db->delete('users', ['id' => $id]);
        return $this->db->affected_rows(); //true 1, false -1
    }

    public function updateUser($id, $data)
    {
        $this->db->update('users', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
