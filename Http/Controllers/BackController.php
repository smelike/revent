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
        $this->middleware('auth');
    }

    public function index()
    {
        return view('back.index');
    }
}