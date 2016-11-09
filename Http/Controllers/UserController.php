<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 11/4/16
 * Time: 5:51 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;

class UserController extends Controller
{

    public function index()
    {
        return view('user.index');
    }

    public function store(Request $request)
    {
        $this->registerRules($request);
        $return = User::create([
                'email' => $request->email,
                'password' => $request->pwd,
        ]);
        if ($return) {

            return redirect('user');
        }
    }

    public function show()
    {

    }
}