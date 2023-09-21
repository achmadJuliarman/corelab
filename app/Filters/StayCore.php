<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;

class StayCore implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Periksa apakah pengguna masuk dan memiliki ID_LEVEL 3 (guest)
        if (session()->get('isLoggedIn') && session()->get('ID_LEVEL') == 3) {
            // Pengguna memiliki akses ke core, biarkan mereka lanjut
            return;
        } else {
            // Pengguna tidak memiliki akses ke core, arahkan mereka ke halaman lain
            return redirect()->to('/'); // Ganti dengan halaman yang sesuai
        }
    }

    public function after(RequestInterface $request, $response, $arguments = null)
    {
        // Kosongkan metode after jika tidak memerlukan tindakan khusus
    }
}
