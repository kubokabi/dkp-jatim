<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Ambil data dari session
        $role = session()->get('role');
        $requestedUri = $request->getUri()->getPath();

        // Jika pengguna tidak terautentikasi, redirect ke login
        if (!$role) {
            return redirect()->to('/login');
        }

        // Tentukan dashboard yang sesuai dengan role
        $dashboardPaths = [
            'petugas_lapangan' => 'PetugasLapangan',
            'kepala_tpi' => 'KepalaTPI',
            'kepala_bidang' => 'KepalaBidang',
        ];

        // Periksa apakah pengguna mencoba mengakses dashboard yang tidak sesuai
        if (array_key_exists($role, $dashboardPaths)) {
            $dashboardPath = $dashboardPaths[$role];
            if ($requestedUri !== '/' . $dashboardPath) {
                return redirect()->to(base_url($dashboardPath));
            }
        }

        // Jika tidak ada redirect, biarkan request lanjut
    }
    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return ResponseInterface|void
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
