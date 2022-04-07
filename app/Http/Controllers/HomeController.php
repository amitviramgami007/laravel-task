<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Imports\ProductsImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return redirect('/dashboard');
    }

    public function imageSlider()
    {
        $banners = Banner::all();
        return view('frontend.image-slider', compact('banners'));
    }

    public function viewProducts()
    {
        return view('frontend.products');
    }

    public function storeProducts(Request $request)
    {
        $file = $request->file('import_file');
        Excel::import(new ProductsImport, $file);

        Session::flash('statusCode', 'success');
        return redirect()->route('frontend-products')->with('status', 'Product Imported Successfully');
    }
}
