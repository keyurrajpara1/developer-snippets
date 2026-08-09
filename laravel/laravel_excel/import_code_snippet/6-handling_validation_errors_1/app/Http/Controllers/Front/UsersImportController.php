<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;

class UsersImportController extends Controller
{
    public function show(Request $request){
        return view('front.users.import');
    }
    public function store(Request $request){
        $file = $request->file('file')->store("import");

        $import = new UsersImport;
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            return back()->withFailures($import->failures());
        }

        return back()->withStatus('Excel file imported successfully');
    }
}
