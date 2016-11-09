<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StrategyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $strategys = \App\Strategy::all();

        return view('back.strategy_index', compact('strategys'));
    }

    public function store(Request $request)
    {
        $this->validate(
            $request,
            ['name' => 'required|alpha_dash'],
            [
                'name.required' => '名字不能为空',
                'name.alpha_dash' => '名字只能是字母,数字, -',
            ]
        );
        \App\Strategy::create(
            ['name' => $request->name]
        );
        return redirect('strategy')->with('success', '产品类型添加成功');
    }

    public function del($id)
    {
        if ((int) $id)
        {
            $product = \App\Strategy::find($id);
            $product->delete();
            return redirect('strategy')->with('success', '删除成功');
        }
    }

}
