<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;

class StayCore implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Ambil ID_LEVEL pengguna dari sesi
        $id_level = session()->get('ID_LEVEL');

        // dd($id_level);
        // Cek jika pengguna adalah admin (ID_LEVEL 1 atau pimpinan (ID_LEVEL 2))
        if ($id_level == 1 || $id_level == 3) {
            return;
        } else {
            // Pengguna bukan admin atau pimpinan, arahkan mereka ke halaman pesan kesalahan
            return redirect()->to('/error-page');
        }
    }

    public function after(RequestInterface $request, $response, $arguments = null)
    {
        // Kosongkan metode after jika tidak memerlukan tindakan khusus
    }
}
