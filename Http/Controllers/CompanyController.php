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
        $company_types = \App\Type::all();
        $product_types = \App\Product::all();
        $strategy_types = \App\Strategy::all();

        return view('back.company_create', compact('company_types', 'product_types', 'strategy_types'));
    }

    public function edit($id)
    {
        if ((int)$id)
        {
            $company_types = \App\Type::all();
            $company = \App\Company::find($id);
            $company->invest_strategy = json_decode($company->invest_strategy, true);
            $company->product_type = json_decode($company->product_type, true);
            $product_types = \App\Product::all();
            $strategy_types = \App\Strategy::all();
            return view('back.company_edit', compact('company', 'company_types', 'product_types', 'strategy_types'));
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
            $company->product_type = json_decode($company->product_type, true);
            $company->invest_strategy = json_decode($company->invest_strategy, true);
            $type = \App\Type::where('id', $company->company_type_id)->first(['type']);

            $product_types = '';
            if ($company->product_types)
            {
                $product_types = \App\Product::find($company->product_type)->toArray(['name']);
                $product_types = join(',' ,array_column($product_types, 'name'));
            }

            $strategy_types = '';
            if ($company->invest_strategy) {
                $strategy_types = \App\Strategy::find($company->invest_strategy)->toArray(['name']);
                $strategy_types = join(' , ', array_column($strategy_types, 'name'));

            }
            return view('back.company_show', compact('company', 'type', 'product_types', 'strategy_types'));
        }
        return back();
    }
    private function validateInfo($request)
    {
        $rules = [
            'id' => 'integer|exists:t_type,id',
            'industry_no' => 'required|integer',
            'company_name' => 'required|alpha_dash',
            'office_addr' => 'required|alpha_dash',
            'manager' => 'required|alpha_dash',
        ];

        $messages = [
            'id.integer' => '必须是数字',
            'id.exists'   => '不存在的公司类型',
            'industry_no.required' => '必须填写登记编号',
            'industry_no.integer' => '登记编号必须是数字',
            'company_name.required' => '必须填写公司名称',
            'starup_date.required' => '必须填写公司成立日期',
            'office_addr.required' => '必须填写公司地址',
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
            'company_type_id' => $request->id,
            'company_name' => $request->company_name,
            'industry_no' => $request->industry_no,
            'startup_date' => $request->startup_date,
            'office_addr' => $request->office_addr,
            'estate_scale' => $request->estate_scale,
            'profess_count' => $request->profess_count,
            'private_count' => $request->private_count,
            'product' => $request->product,
            'fellow' => $request->fellow,
            'personal_info' => $request->personal_info,
            'product_type' => json_encode($request->product_type, JSON_FORCE_OBJECT),
            'invest_strategy' => json_encode($request->invest_strategy, JSON_FORCE_OBJECT),
            'manager' => $request->manager,
            'pay_fee' => $request->pay_fare,
            'new_wealth_vote' => $request->new_wealth_vote,
            'fof' => $request->fof ? $request->fof : '',
        ]);
    }
}