<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 11/7/16
 * Time: 5:43 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $companys = \App\Company::all();
        return view('back.company_index', compact('companys'));
    }

    public function create()
    {
        $types = \App\Type::all();
        return view('back.company_create', compact('types'));
    }

    public function show($id = 0)
    {
        if ($id)
        {
            $company = \App\Company::find($id);
            //dd($company);
            return view('back.company_show', compact('company'));
        }

        return back();

    }
    public function store(Request $request)
    {
        $rules = [
            'id' => 'integer|exists:t_type',
            'name' => 'required|alpha_dash',
            'addr' => 'required|alpha_dash',
            'manager' => 'required|alpha_dash',
        ];

        $messages = [
            'id.integer' => '必须选择公司类别',
            'id.exists'   => '不存在的公司类型',
            'name.required' => '必须填写公司名称',
            'addr.required' => '必须填写公司地址',
            'manager.required' => '必须填写对口销售/服务经理',
        ];
        $this->validate($request, $rules, $messages);

        if ($this->createCompany($request)) {
            $request->session()->flash('create_company_success', '公司添加成功');
            return redirect('company');
        }
    }

    private function createCompany($request)
    {
        return \App\Company::create([
            'type_id' => $request->id,
            'name' => $request->name,
            'addr' => $request->addr,
            'manager' => $request->manager,
            'pay_fare' => $request->pay_fare,
            'new_wealth_vote' => $request->new_wealth_vote ? $request->new_wealth_vote : '',
            'fof' => $request->fof ? $request->fof : '',
            'remark' => $request->remark ? $request->remark : '',
        ]);
    }
}