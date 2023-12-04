<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $session = \Config\Services::session();
        return view('/login/index', ['error_message' => $session->getFlashdata('error_message')]);
    }

    public function prosesLogin()
    {
        $email = $this->request->getPost('email');
        $passwords = $this->request->getPost('passwords');

        $user_model = new \App\Models\User();
        $user = $user_model->getUserLogin($email, $passwords);

        $session = \Config\Services::session();
        if ($user) {
            $session->set(['user' => $user]);
            return redirect()->to('/');
        } else {
            $session->setFlashdata(['error_message' => 'email dan passwords tidak benar']);
            return redirect()->to('/login');
        }
    }

    public function Logout()
    {
        $session = \Config\Services::session();
        $session->destroy();
        return redirect()->to('/');
    }
}
