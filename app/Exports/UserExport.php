<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class UserExport implements FromQuery, ShouldAutoSize, WithMapping, WithHeadings
{
    protected $id;

    function __construct($id) {
            $this->id = $id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        return User::query()->where('kelas_id', $this->id)->with('role')->orderBy('absen', 'ASC');
    }

    public function map($user) :array
    {
        return [
            $user->absen,
            $user->name,
            $user->nisn,
            $user->role->role,
            $user->email,
        ];
    }

    public function headings(): array
    {
        return [
            '#',
            'Nama',
            'NISN',
            'Status',
            'Email',
        ];
    }
}
