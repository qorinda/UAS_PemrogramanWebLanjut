<?php

class Invoice extends CI_Model
{
    public function getInvoice($id = null)
    {
        if ($id == null) {
            $this->db->select('invoices.id as id_invoice,id_user,id_course,tgl_transaksi,name,email,nama_course');
            $this->db->join('users', 'users.id = invoices.id_user');
            $this->db->join('courses', 'courses.id = invoices.id_course');
            return $this->db->get('invoices')->result_array();
        } else {
            $this->db->select('invoices.id as id_invoice,id_user,id_course,tgl_transaksi,name,email,nama_course,keterangan_course,kategori_course,harga_course,rating_course,gambar_course');
            $this->db->join('users', 'users.id = invoices.id_user');
            $this->db->join('courses', 'courses.id = invoices.id_course');
            return $this->db->get_where('invoices', ['invoices.id' => $id])->result_array();
        }
    }

    public function deleteInvoice($id)
    {
        $this->db->delete('invoices', ['id' => $id]);
        return $this->db->affected_rows(); //true 1, false -1
    }

    public function createInvoice($data)
    {
        $this->db->insert('invoices', $data);
        return $this->db->affected_rows();
    }
}
