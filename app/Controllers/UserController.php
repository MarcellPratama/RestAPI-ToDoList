<?php
    namespace App\Controllers;

    use App\Models\Pengguna;
    use CodeIgniter\Controller;

    class UserController extends Controller {
        public function login(){
            $model = new Pengguna();
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            $user = $model->where('username', $username)->first();

            if ($user && $user['password'] === md5($password)) {
                session()->set('username', $username);
                return redirect()->to('/todolist');
            }

            return redirect()->back()->with('error', 'Invalid username or password');
        }

        public function logout() {
            session()->destroy();
            return redirect()->to('/login');
        }

        public function loginview()
        {
            helper(['form', 'url']);
            echo view('login_view');
        }
    }
?>