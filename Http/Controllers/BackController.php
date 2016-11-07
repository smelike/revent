<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 11/7/16
 * Time: 11:42 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackController extends Controller
{

    public function __construct()
    {
        // 没看懂是怎么使用 middleware 来验证登陆用户的
        $this->middleware('auth');
    }

    public function index()
    {
        //return view('back.index');
    }
}