<?php

namespace App\Controllers;

use PhpParser\Node\Expr\FuncCall;

class Home extends BaseController
{
    public function index(): string
    {
        return view('FrontEnd/index');
    }

    public function dinas_kelautan_perikanan()
    {
        return view('FrontEnd/dinas-kelautan-dan-perikanan');
    }

    public function sekretariat()
    {
        return view("FrontEnd/sekretariat");
    }

    public function bidang_budidaya()
    {
        return view("FrontEnd/bidang-budidaya");
    }

    public function bidang_tangkap()
    {
        return view("FrontEnd/bidang-tangkap");
    }

    public function bidang_kpp()
    {
        return view("FrontEnd/bidang-kpp");
    }

    public function bidang_p3kp(){
        return view("FrontEnd/bidang-p3kp");
    }

    public function cabdin(){
        return view("FrontEnd/cabdin");
    }

    public function upt_instalasi(){
        return view("FrontEnd/upt-instalasi");
    }

    public function struktur_organisasi(){
        return view("FrontEnd/struktur-organisasi");
    }

    public function unit(){
        return view("FrontEnd/unit");
    }

    public function publikasi(){
        return view("FrontEnd/publikasi");
    }

    public function kegiatan(){
        return view("FrontEnd/kegiatan");
    }

    public function lokasi_tpi(){
        return view("FrontEnd/lokasi-tpi");
    }

    public function galeri(){
        return view("FrontEnd/galeri");
    }
}
