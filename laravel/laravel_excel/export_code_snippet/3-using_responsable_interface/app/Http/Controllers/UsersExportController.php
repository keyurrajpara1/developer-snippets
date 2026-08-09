<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class UsersExportController extends Controller
{
    public function export(){
        // return Excel::download(new UsersExport, 'users.xlsx');
        // return (new UsersExport)->download('users.xlsx');
        return new UsersExport;
    }
}
