<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Petugas extends ResourceController
{
    protected $modelName = 'App\Models\PetugasModel';
    protected $formar = 'json';

    public function index()
    {
        return $this->respond($this->model->findAll());
    }

    // create
    public function create()
    {
        $pwd = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $data = [
            'nip' => $this->request->getPost('nip'),
            'nama' => $this->request->getPost('nama'),
            'jk' => strtoupper($this->request->getPost('jk')),
            'tmp_lahir' => $this->request->getPost('tmp_lahir'),
            'tgl_lahir' => $this->request->getPost('tgl_lahir'),
            'alamat' => $this->request->getPost('alamat'),
            'password' => $pwd,

        ];

        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Berhasil signup'
            ]
        ];

        if (!$this->validate('signup')) {
            $response['error'] = \Config\Services::validation()->getErrors();
            $response['status'] = 400;
            $response['messages'] = null;
        } else {
            $this->model->insert($data);
        }
        return $this->respondCreated($response);
    }
    // update
    // delete
}
