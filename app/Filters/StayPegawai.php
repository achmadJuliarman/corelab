<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class StayPegawai implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // // Do something here
        // if (session()->get('NO')) {
        //     return redirect()->to('/pegawai');
        // }

        // Ambil ID_LEVEL pengguna dari sesi
        $id_level = session()->get('ID_LEVEL');

        // Cek jika pengguna adalah admin (ID_LEVEL 1)
        if ($id_level === 1) {
            return redirect()->to('/pegawai');
        } elseif ($id_level === 2) {
            return redirect()->to('/dashboard');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
