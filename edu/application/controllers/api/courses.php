<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Courses extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->methods['index_get']['limit'] = 100;
        $this->methods['index_post']['limit'] = 100;
        $this->methods['index_put']['limit'] = 100;
        $this->methods['index_delete']['limit'] = 100;
    }

    public function index_get()
    {
        $id = $this->get('id');
        if ($id == null) {
            $courses = $this->course->getCourse();
        } else {
            $courses = $this->course->getCourse($id);
        }

        if ($courses) {
            $this->response([
                'status' => true,
                'data' => $courses
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found!'
            ], RestController::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $id = $this->delete('id');
        if ($id == null) {
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], RestController::HTTP_BAD_REQUEST);
        } else {
            if ($this->course->deleteCourse($id) > 0) {
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted'
                ], RestController::HTTP_OK);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], RestController::HTTP_NOT_FOUND);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'id_teacher' => $this->post('id_teacher'),
            'nama_course' => $this->post('nama_course'),
            'keterangan_course' => $this->post('keterangan_course'),
            'kategori_course' => $this->post('kategori_course'),
            'harga_course' => $this->post('harga_course'),
            'rating_course' => $this->post('rating_course'),
            'gambar_course' => $this->post('gambar_course'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        if ($this->course->createCourse($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new course has been created'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to create new data'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'id_teacher' => $this->put('id_teacher'),
            'nama_course' => $this->put('nama_course'),
            'keterangan_course' => $this->put('keterangan_course'),
            'kategori_course' => $this->put('kategori_course'),
            'harga_course' => $this->put('harga_course'),
            'rating_course' => $this->put('rating_course'),
            'gambar_course' => $this->put('gambar_course'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->course->updateCourse($id, $data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data course has been updated'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update new data'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
