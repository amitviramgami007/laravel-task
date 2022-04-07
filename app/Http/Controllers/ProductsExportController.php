<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Excel;
use App\Exports\ProductsExport;

class ProductsExportController extends Controller
{
    public function export(Excel $excel)
    {
        return $excel->download(new ProductsExport, 'Products.xlsx');
    }
}
