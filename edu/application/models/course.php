<?php

class Course extends CI_Model
{
    public function getCourse($id = null)
    {
        if ($id == null) {
            $this->db->select('id as id_course,nama_course,keterangan_course,kategori_course,harga_course,rating_course,gambar_course');
            return $this->db->get('courses')->result_array();
        } else {
            $this->db->select('courses.id as id_course,nama_course,keterangan_course,kategori_course,harga_course,rating_course,gambar_course,nama_teacher,job_teacher,quote_teacher,gambar_teacher');
            $this->db->join('teachers', 'courses.id_teacher = teachers.id');
            return $this->db->get_where('courses', ['courses.id' => $id])->result_array();
        }
    }

    public function deleteCourse($id)
    {
        $this->db->delete('courses', ['id' => $id]);
        return $this->db->affected_rows(); //true 1, false -1
    }

    public function createCourse($data)
    {
        $this->db->insert('courses', $data);
        return $this->db->affected_rows();
    }

    public function updateCourse($id, $data)
    {
        $this->db->update('courses', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}
