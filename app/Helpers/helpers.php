<?php

use App\Models\User;
use Illuminate\Support\Facades\Request;

function setActive($routeName, $active = 'active')
{
    return Request::segment(1) == $routeName ? $active : '';
}

function getUserName($userId)
{
    return User::where('id', $userId)->value('name');
}

function storeImage($request, $path)
{
    if($request->hasFile('image'))
    {
        $image = $request->file('image');
        $fileName = date('dmY').time().'.'.$image->getClientOriginalExtension();
        $request->image->storeAs($path, $fileName, 'public');
        // $image->move(public_path('/'.$path), $fileName);
        return $fileName;
    }
}

function getTotalCount($modelName)
{
    $modelName = "App\\Models\\".$modelName;
    return $modelName::count();
}
