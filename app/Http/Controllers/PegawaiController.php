<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DateTime;
class PegawaiController extends Controller
{
    public function index()
    {
        $name = "Muhammad Faiz Syauqi";
        $tanggal_lahir = '2006-06-01';
        $tgl_harus_wisuda = '2028-10-03';
        $current_semester = 3;
        $hobbies = ["Membaca", "Coding", "Gaming", "Travelling", "Nonton film"];
        $future_goal = "Menjadi Software Engineer Profesional";

        $lahir = new DateTime($tanggal_lahir);
        $hari_ini = new DateTime();
        $my_age = $hari_ini->diff($lahir)->y;

        $wisuda = new DateTime($tgl_harus_wisuda);
        $time_to_study_left = $hari_ini->diff($wisuda)->days;

        if ($current_semester < 3) {
            $informasi = "Masih Awal, Kejar TAK!";
        } else {
            $informasi = "Jangan main-main, kurangi main game!";
        }

        $data = [
            'name' => $name,
            'my_age' => $my_age,
            'hobbies' => $hobbies,
            'tgl_harus_wisuda' => $tgl_harus_wisuda,
            'time_to_study_left' => $time_to_study_left . " hari",
            'current_semester' => $current_semester,
            'motivasi' => $informasi,
            'future_goal' => $future_goal
        ];

        return view('pegawai', $data);
    }
}
