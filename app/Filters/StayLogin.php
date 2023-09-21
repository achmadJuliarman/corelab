<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class StayLogin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Periksa apakah pengguna telah login
        if (session()->get('isLoggedIn')) {
            // Jika sudah login, arahkan ke halaman yang sesuai
            $id_level = session()->get('ID_LEVEL');

            switch ($id_level) {
                case 1:
                    return redirect()->to('/pegawai');
                case 2:
                    return redirect()->to('/dashboard');
                case 3:
                    return redirect()->to('/core');
                default:
                    // Tindakan default jika tidak ada level yang cocok
                    break;
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
