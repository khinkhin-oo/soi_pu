<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;


class UsersExport implements FromCollection
{
	private $data;

    public function __construct($data)
    {
        $this->data 	 = $data;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return collect([$this->data]);
    }
    /* public function array(): array
    {
        return $this->data->downloadExcel();
    }*/
}
