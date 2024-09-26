<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


// Fornt End 

$routes->get('/', 'Home::index');
$routes->get('/dinas-kelautan-dan-perikanan', 'Home::dinas_kelautan_perikanan');
$routes->get('/sekretariat', 'Home::sekretariat');
$routes->get('/bidang-budidaya', 'Home::bidang_budidaya');
$routes->get('/bidang-tangkap', 'Home::bidang_tangkap');
$routes->get('/bidang-kpp', 'Home::bidang_kpp');
$routes->get('/bidang-p3kp', 'Home::bidang_p3kp');
$routes->get('/cabdin', 'Home::cabdin');
$routes->get('/upt-instalasi', 'Home::upt_instalasi');
$routes->get('/struktur-organisasi', 'Home::struktur_organisasi');
$routes->get('/unit', 'Home::unit');
$routes->get('/publikasi', 'Home::publikasi');
$routes->get('/kegiatan', 'Home::kegiatan');
$routes->get('/lokasi-tpi', 'Home::lokasi_tpi');
$routes->get('/galeri', 'Home::galeri');


// Backend 

$routes->get('login', 'Auth::index');
$routes->post('login/authenticate', 'Auth::authenticate');
$routes->get('logout', 'Auth::logout');

$routes->group('PetugasLapangan', ['filter' => 'role'], function ($routes) {
    $routes->get('/', 'PetugasLapangan::index');
});

$routes->group('KepalaTPI', ['filter' => 'role'], function ($routes) {
    $routes->get('/', 'KepalaTPI::index');
});

$routes->group('KepalaBidang', ['filter' => 'role'], function ($routes) {
    $routes->get('/', 'KepalaBidang::index');
});
