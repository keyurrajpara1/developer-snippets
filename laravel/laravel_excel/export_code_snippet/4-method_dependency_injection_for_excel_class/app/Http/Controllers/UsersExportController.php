<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel as FacadesExcel;
use App\Exports\UsersExport;

use Maatwebsite\Excel\Excel;

class UsersExportController extends Controller
{
    public function export(Excel $excel){
        return $excel->download(new UsersExport, 'users.xlsx');
    }
}
