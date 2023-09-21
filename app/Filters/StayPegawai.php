<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class StayPegawai implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Ambil ID_LEVEL pengguna dari sesi
        $id_level = session()->get('ID_LEVEL');

        // dd($id_level);
        // Cek jika pengguna adalah admin (ID_LEVEL 1)
        if ($id_level == 1) {
            return;
        } else {
            // Pengguna bukan admin atau pimpinan, arahkan mereka ke halaman pesan kesalahan
            return redirect()->to('/error-page');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
