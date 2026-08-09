<?php
namespace App\Imports;
use App\Models\Front\User;
use Illuminate\Support\Facades\Hash;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;

class UsersImport implements ToModel
{
    use Importable;
    /**
    * @param array $row
    * 
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'name' => $row[0],
            'email' => $row[1],
            'password' => Hash::make('password'),
        ]);
    }
}
