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
        // $file = $request->file('file'); // Directly load - Used for only small size file.
            // OR
        $file = $request->file('file')->store("import"); // First store to server and then load file
        // storage\app\import\XqscUB6DkwyhY12vpKJVwWP1fiGmMwPIczacdyW5.xlsx

        // Excel::import(new UsersImport, $file);
        (new UsersImport)->import($file);
        return back()->withStatus('Excel file imported successfully');
    }
}
