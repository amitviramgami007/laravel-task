<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class ProductsImportController extends Controller
{
    public function show()
    {
        return view('products.import');
    }

    public function store(Request $request)
    {
        $file = $request->file('import_file');
        Excel::import(new ProductsImport, $file);

        Session::flash('statusCode', 'success');
        return redirect()->route('products.index')->with('status', 'Product Imported Successfully');
    }
}
