<?php

namespace App\Models;

use CodeIgniter\Model;

class Todolist extends Model
{
    protected $table            = 'todolist';
    protected $primaryKey       = 'idkegiatan';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['username', 'kegiatan', 'status'];

}
