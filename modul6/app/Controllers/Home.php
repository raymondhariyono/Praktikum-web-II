<?php

namespace App\Controllers;

use App\Models\BiodataModel;

class Home extends BaseController
{
    public function index()
    {
        $model = new BiodataModel();
        $data['mahasiswa'] = $model->getData();
        return view('beranda', $data);
    }
}