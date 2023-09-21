<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Filter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $id_level = session()->get('ID_LEVEL');

        // Filter StayLogin
        if (!session()->get('NO')) {
            return redirect()->to('login');
        }

        // Filter StayPegawai
        if ($id_level === 1) {
            return redirect()->to('/pegawai');
        }

        // Filter StayDashboard
        if ($id_level === 2) {
            return redirect()->to('/dashboard');
        }

        // Filter StayCore
        if ($id_level === 3) {
            return redirect()->to('/core');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
