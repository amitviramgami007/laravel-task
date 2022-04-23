<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $createRoute = 'products.create';

        if ($request->ajax())
        {
            $data = Product::latest()->get();

            return DataTables::of($data)
                ->addColumn('image', function ($data)
                {
                    return (string) view('products.image', ['image' => $data->image]);
                })
                ->addColumn('created_by', function ($data)
                {
                    return getUserName($data->created_by);
                })
                ->addColumn('updated_by', function ($data)
                {
                    return getUserName($data->updated_by);
                })
                ->addColumn('action', function($data)
                {
                    return (string) view('products.action', ['id' => $data->id]);
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('products.index', compact('createRoute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routeName = Route::currentRouteName();
        return view('products.create', compact('routeName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $input = $request->all();
        $input['image'] = storeImage($request, 'uploads');
        Product::create($input);

        Session::flash('statusCode', 'success');
        return redirect()->route('products.index')->with('status', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $routeName = Route::currentRouteName();
        return view('products.edit', compact('product', 'routeName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $input = $request->all();
        if(isset($input['image']))
        {
            $input['image'] = storeImage($request, 'uploads');
        }
        $product->update($input);

        Session::flash('statusCode', 'success');
        return redirect()->route('products.index')->with('status', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Session::flash('statusCode', 'success');
        return redirect()->route('products.index')->with('status', 'Product Deleted Successfully');
    }
}
