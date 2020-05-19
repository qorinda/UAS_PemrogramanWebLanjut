<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Users extends RestController
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
            $users = $this->user->getUser();
        } else {
            $users = $this->user->getUser($id);
        }

        if ($users) {
            $this->response([
                'status' => true,
                'data' => $users
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
            if ($this->user->deleteUser($id) > 0) {
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

    public function index_put()
    {
        $id = $this->put('id');
        $data = [
            'name' => $this->put('name'),
            'email' => $this->put('email'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if ($this->user->updateUser($id, $data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'data user has been updated'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to update new data'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
