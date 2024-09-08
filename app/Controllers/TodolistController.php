<?php

namespace App\Controllers;

use App\Models\TodolistModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class TodolistController extends Controller
{
    public function index()
    {
        helper(['form', 'url']);
        $session = session();
        
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $model = new TodolistModel();
        $data['tasks'] = $model->getTasksByUser($session->get('username'));

        echo view('todolist_view', $data);
    }

    public function addTask()
    {
        $session = session();
        $model = new TodolistModel();

        $data = [
            'username' => $session->get('username'),
            'kegiatan' => $this->request->getPost('kegiatan'),
            'status' => 'Aktif',
            'user' => $session->get('username')
        ];

        $model->save($data);
        return redirect()->to('/');
    }

    public function updateTaskStatus($id)
    {
        $model = new TodolistModel();
        $model->updateTaskStatus($id, 'Selesai');
        return redirect()->to('/');
    }

    public function deleteTask($id)
    {
        $model = new TodolistModel();
        $model->deleteCompletedTask($id);
        return redirect()->to('/');
    }

    public function login()
    {
        helper(['form', 'url']);
        
        echo view('login_view');
    }

    public function loginSubmit()
    {
        $session = session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // Fetch user data by username
        $user = $model->getUser($username);

        // Check if user exists and if 'password' key is present
        if ($user && isset($user['password'])) {
            // Verify if the input password hashed with MD5 matches the stored password
            if ($user['password'] === md5($password)) {
                // Set session data upon successful login
                $session->set([
                    'username' => $user['username'],
                    'isLoggedIn' => true
                ]);

                return redirect()->to('/');
            } else {
                // Set error flash data for wrong password
                $session->setFlashdata('error', 'Invalid Credentials');
                return redirect()->to('/login');
            }
        } else {
            // Set error flash data for non-existent user
            $session->setFlashdata('error', 'User does not exist');
            return redirect()->to('/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
