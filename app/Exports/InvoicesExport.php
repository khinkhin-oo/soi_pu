<?php

namespace App\Exports;

use App\Invoice;
use App\Models\CelebrityModel;
use Maatwebsite\Excel\Concerns\FromCollection;

use Excel;

class InvoicesExport implements FromCollection
{
	public function collection()
    {
        return CelebrityModel::all();
    }

    public function export() 
    {
        return Excel::download(new InvoicesExport, 'invoices.xlsx');
    }

}