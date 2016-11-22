<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 11/14/16
 * Time: 4:07 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Connect;

class ConnectController extends Controller
{

    public function index()
    {
        $connect_company = Connect::find(['id', 'company_id']);

        return view('back.connect_index');
    }

    public function addConnect(Request $request)
    {
        $companys = \App\Company::all();
        return view('back.connect_add', compact('companys'));
    }

    public function create(Request $request)
    {
        $this->validateInfo($request);

        try {
            $insert = Connect::create([
                'company_id' => $request->company_id,
                'name' => $request->name,
                'duty' => $request->duty,
                'landline_tel' => $request->landline_tel,
                'email' => $request->email,
                'covers' => $request->covers,
                'focus' => $request->focus
            ]);
            dd($insert);
        } catch (\Exception $e) {
            echo 1212;
        }
        return redirect("connect/{$request->company_id}");
    }

    private function validateInfo($request)
    {
        $rules = [
            'company_id' => 'required|integer|exists:t_company,id',
            'name' => 'required|alpha_dash',
            'duty' => 'required|alpha_dash',
            'landline_tel' => 'required|alpha_dash',
            'email' => 'email',
        ];

        $messages = [
            'company_id.required' => '必须先添加的公司',
            'company_id.integer' => '必须是数字',
            'company_id.exist' => '不存在的公司',
            'name.required' => '必须填写人员姓名',
            'company_id.exists'   => '该公司不存在',
            'duty.required' => '必须填写职务',
            'industry_no.integer' => '登记编号必须是数字',
            'landline_tel.required' => '必须填写固定电话',
            'email.email' => '请填写正确的邮件地址',
        ];
        $this->validate($request, $rules, $messages);
    }
}