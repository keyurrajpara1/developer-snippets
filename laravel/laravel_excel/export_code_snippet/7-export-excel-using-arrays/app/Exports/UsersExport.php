<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\Support\Responsable;

use Illuminate\Database\Eloquent\Collection;

use Maatwebsite\Excel\Concerns\FromArray;

// class UsersExport implements FromCollection
class UsersExport implements FromArray
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all();

        // 1. Export excel using arrays
        /*return new Collection([
            ['Liam', 'liam@gmail.com']
        ]);*/
    }

    // 2. Export excel using arrays
    public function array(): array
    {
        return [
            ['Liam', 'liam@gmail.com']
        ];
    }
}
