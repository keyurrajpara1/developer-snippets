<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, ShouldAutoSize, WithMapping, WithHeadings
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return User::all();
        return User::with('userAddress')->get();
    }
    public function map($user): array{
        return [
            $user->id,
            $user->first_name,
            $user->email,
            $user->userAddress->country,
        ];
    }
    public function headings(): array{
        return [
            '#',
            'First Name',
            'Email',
            'Country',
        ];
    }
}
