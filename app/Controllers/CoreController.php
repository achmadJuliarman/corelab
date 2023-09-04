<?php

namespace App\Controllers;

class CoreController extends BaseController
{
    public function index(): string
    {
        return view('layouts/template');
    }
}
