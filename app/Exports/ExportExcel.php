<?php

namespace App\Exports;

use App\Models\Penduduk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportExcel implements FromView
{
    public function view(): View
    {
        return view('contents.export-excel', [
            'datawarga' => Penduduk::all()
        ]);
    }
}
