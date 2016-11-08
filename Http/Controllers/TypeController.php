<?php
/**
 * Created by PhpStorm.
 * User: james
 * Date: 11/8/16
 * Time: 3:26 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function test()
    {
        $arr_data = ['券商', '信托', '第三方销售', 'PE/VC', '企业', '第三方财富管理', '上市公司', '非上市公司', '高净值客户', '传媒'];

        foreach($arr_data as $key => $data) {

            \App\Type::create([
                'type' => $data
            ]);

            var_dump($key);
            echo '<br/>';
        }
    }
}