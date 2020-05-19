<?php

use chriskacerguis\RestServer\RestController;

require APPPATH . 'libraries/RestController.php';
require APPPATH . 'libraries/Format.php';

class Invoices extends RestController
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
            $invoices = $this->invoice->getInvoice();
        } else {
            $invoices = $this->invoice->getInvoice($id);
        }

        if ($invoices) {
            $this->response([
                'status' => true,
                'data' => $invoices
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
            if ($this->invoice->deleteInvoice($id) > 0) {
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
            'id_user' => $this->post('id_user'),
            'id_course' => $this->post('id_course'),
            'tgl_transaksi' => date('Y-m-d H:i:s'),
            'created_at' => date('Y-m-d H:i:s'),
        ];

        if ($this->invoice->createInvoice($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'new invoice has been created'
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'failed to create new invoice'
            ], RestController::HTTP_BAD_REQUEST);
        }
    }
}
