<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\StoreBannerRequest;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $createRoute = 'banners.create';

        if ($request->ajax())
        {
            $data = Banner::latest()->get();

            return DataTables::of($data)
                ->addColumn('image', function ($data)
                {
                    return (string) view('banners.image', ['image' => $data->image]);
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
                    return (string) view('banners.action', ['id' => $data->id]);
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }

        return view('banners.index', compact('createRoute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routeName = Route::currentRouteName();
        return view('banners.create', compact('routeName'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBannerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBannerRequest $request)
    {
        $input = $request->all();
        $input['image'] = storeImage($request, 'banners');
        Banner::create($input);

        Session::flash('statusCode', 'success');
        return redirect()->route('banners.index')->with('status', 'Banner Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        return view('banners.show', compact('banner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        $routeName = Route::currentRouteName();
        return view('banners.edit', compact('banner', 'routeName'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBannerRequest  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBannerRequest $request, Banner $banner)
    {
        $input = $request->all();
        $input['image'] = storeImage($request, 'banners');
        $banner->update($input);

        Session::flash('statusCode', 'success');
        return redirect()->route('banners.index')->with('status', 'Banner Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        Session::flash('statusCode', 'success');
        return redirect()->route('banners.index')->with('status', 'Banner Deleted Successfully');
    }
}
