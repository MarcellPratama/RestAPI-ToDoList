<?php

namespace App\Models;

use CodeIgniter\Model;

class TodolistModel extends Model
{
    protected $table = 'todolist';
    protected $primaryKey = 'idkegiatan';
    protected $allowedFields = ['username', 'kegiatan', 'status', 'user'];

    public function getTasksByUser($username)
    {
        return $this->where('username', $username)->findAll();
    }
    
    public function updateTaskStatus($id, $status)
    {
        return $this->update($id, ['status' => $status]);
    }

    public function deleteCompletedTask($id)
    {
        return $this->delete($id);
    }
}
