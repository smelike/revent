<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $products = \App\Product::all();

        return view('back.product_index', compact('products'));
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
        \App\Product::create(
            ['name' => $request->name]
        );
        return redirect('product')->with('success', '产品类型添加成功');
    }

    public function del($id)
    {
        if ((int) $id)
        {
            $product = \App\Product::find($id);
            $product->delete();
            return redirect('product')->with('success', '删除成功');
        }
    }

}
