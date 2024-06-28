<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function showUser()
    {
        $users = [
            [
                'id' => '1',
                'name' => 'chien',
            ],
            [
                'id' => '2',
                'name' => 'chien3',
            ],
        ];
        return view('list-user')->with([
            'abc'=>$users
        ]);
    }

    function getUser($id, $name = '')
    {
        echo $id;
        echo $name;
    }

    function updateUser(Request $request)
    {
        echo $request->id;
        echo $request->name;
    }
}
