<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class TodolistControllerAPI extends ResourceController
{
    protected $modelName = 'App\Models\Todolist';
    protected $format = 'json';
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index()
    {
        $userId = session()->get('username');
        if (!$userId) {
            return $this->failUnauthorized('You need to be logged in to view tasks.');
        }

        $tasks = $this->model->where('username', $userId)->findAll();
        return view('/todolist_view', ['tasks' => $tasks]);
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $userId = session()->get('username');
        if (!$userId) {
            return $this->failUnauthorized('You need to be logged in to create tasks.');
        }

        // Aturan validasi untuk 'kegiatan' saja
        $rules = [
            'kegiatan' => 'required',
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        // Data yang akan disimpan
        $task = [
            'username' => $userId,
            'kegiatan' => esc($this->request->getVar('kegiatan')),
            'status'   => 'Aktif'
        ];

        // Menyimpan data ke database
        $this->model->insert($task);

        // Mengambil semua tugas setelah menambahkan tugas baru
        $tasks = $this->model->where('username', $userId)->findAll();

        // Kembali ke tampilan dengan semua tugas
        return view('/todolist_view', ['tasks' => $tasks]);
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $userId = session()->get('username');
        if (!$userId) {
            return $this->failUnauthorized('You need to be logged in to update tasks.');
        }

        $task = $this->model->find($id);
        if (!$task || $task['username'] !== $userId) {
            return $this->failNotFound('Task not found or not authorized to update this task.');
        }

        // Aturan validasi
        $rules = [
            'kegiatan' => 'required',
            'status' => 'required|in_list[Aktif,Selesai]'
        ];

        if (!$this->validate($rules)) {
            return $this->failValidationErrors($this->validator->getErrors());
        }

        // Data yang akan diperbarui
        $data = [
            'kegiatan' => esc($this->request->getVar('kegiatan')),
            'status'   => esc($this->request->getVar('status'))
        ];

        // Memperbarui data
        $this->model->update($id, $data);

        // Mengambil semua tugas setelah pembaruan
        $tasks = $this->model->where('username', $userId)->findAll();

        // Kembali ke tampilan dengan semua tugas
        return view('/todolist_view', ['tasks' => $tasks]);
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $userId = session()->get('username');
        if (!$userId) {
            return $this->failUnauthorized('You need to be logged in to delete tasks.');
        }

        $task = $this->model->find($id);
        if (!$task || $task['username'] !== $userId) {
            return $this->failNotFound('Task not found or not authorized to delete this task.');
        }

        // Menghapus tugas
        $this->model->delete($id);

        // Mengambil semua tugas setelah penghapusan
        $tasks = $this->model->where('username', $userId)->findAll();

        // Kembali ke tampilan dengan semua tugas
        return view('/todolist_view', ['tasks' => $tasks]);
    }
}
