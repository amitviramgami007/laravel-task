<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $createRoute = 'users.create';

        if ($request->ajax())
        {
            $data = User::latest()->get();

            return DataTables::of($data)
                ->addColumn('role', function ($data)
                {
                    return '<label class="badge badge-success">'.$data->role.'</label>';
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
                    return (string) view('users.action', ['id' => $data->id]);
                })
                ->rawColumns(['action', 'role'])
                ->make(true);
        }

        return view('users.index', compact('createRoute'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $routeName = Route::currentRouteName();
        $roles = config('dom.roles');
        return view('users.create', compact('routeName', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        User::create($input);

        Session::flash('statusCode', 'success');
        return redirect()->route('users.index')->with('status', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $routeName = Route::currentRouteName();
        $roles = config('dom.roles');
        return view('users.edit', compact('user', 'routeName', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUserRequest $request, User $user)
    {
        $input = $request->all();

        if(!empty($input['password']))
        {
            $input['password'] = Hash::make($input['password']);
        }
        else
        {
            $input = Arr::except($input, ['password']);
        }

        $user->update($input);

        Session::flash('statusCode', 'success');
        return redirect()->route('users.index')->with('status', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Session::flash('statusCode', 'success');
        return redirect()->route('users.index')->with('status', 'User Deleted Successfully');
    }
}
