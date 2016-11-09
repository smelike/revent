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
        $types = \App\Type::all();
        return view('back.company_index', compact('companys', 'types'));
    }

    public function create()
    {
        $types = \App\Type::all();
        return view('back.company_create', compact('types'));
    }

    public function edit($id)
    {
        if ((int)$id)
        {
            $types = \App\Type::all();
            $company = \App\Company::find($id);

            return view('back.company_edit', compact('company', 'types'));
        }
    }
    public function update(Request $request, $id)
    {
        $this->validateInfo($request);
        $company = \App\Company::find($id);
        $company->type_id = $request->id;
        $company->name = $request->name;
        $company->addr = $request->addr;
        $company->manager = $request->manager;
        $company->pay_fare = $request->pay_fare ? $request->pay_fare : '';
        $company->fof = $request->fof ? $request->fof : '';
        $company->new_wealth_vote = $request->new_wealth_vote ? $request->new_wealth_vote : '';
        $company->remark = $request->remark ? $request->remark : '';
        $company->save();

        $redirect = 'company/' . $id;
        return redirect($redirect)->with('success', '修改成功');
    }
    public function del($id)
    {
        if ((int) $id)
        {
            $company = \App\Company::find($id);
            $company->delete();
            return redirect('company')->with('success', '公司删除成功');
        }
    }
    public function show($id = 0)
    {

        if ($id)
        {
            $company = \App\Company::find($id);
            $type = \App\Type::where('id', $company->type_id)->first(['type']);
            return view('back.company_show', compact('company', 'type'));
        }
        return back();
    }
    private function validateInfo($request)
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
            'addr.alpha_dash' => '只是是字母, 数字, -',
            'manager.required' => '必须填写对口销售/服务经理',
        ];
        $this->validate($request, $rules, $messages);
    }
    public function store(Request $request)
    {

        $this->validateInfo($request);
        if ($this->createCompany($request))
        {
            return redirect('company')->with('success', '公司添加成功');
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