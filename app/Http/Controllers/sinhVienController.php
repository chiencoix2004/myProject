<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sinhVienController extends Controller
{
    
    function showSinhVien()
    {
        $sinhvien = 
            ['id' => '1',
            'name' => 'chien',
            'tuoi' => '20',
            'diachi' => 'ha noi',
            'gioitinh' => 'nam',]
    ;
    return view('sinhVien')->with([
        'abc'=>$sinhvien
    ]);
}
}

// ->with([
//     'abc'=>$sinhvien
// ])