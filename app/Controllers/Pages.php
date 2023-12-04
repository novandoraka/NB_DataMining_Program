<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        //echo 'Hello world !!';
        $session = \Config\Services::session();
        if ($session->get('user') == NULL) {
            return redirect()->to('/login');
        } else {
            return view('/dashboard/index');
        }
    }
    public function data()
    {
        //echo 'Hello world !!';
        return view('/tes/dataset');
    }
    public function perform()
    {
        //echo 'Hello world !!';
        return view('/tes/performance');
    }
    public function predic()
    {
        //echo 'Hello world !!';
        return view('/tes/prediction');
    }
}
