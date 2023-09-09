<?php

namespace App\Exports;

use App\Models\Penduduk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportExcel implements FromView
{
    use Exportable;

    public function view(): View
    {
        return view('contents.export-excel', [
            'datawarga' => Penduduk::all()
        ]);
    }
}
