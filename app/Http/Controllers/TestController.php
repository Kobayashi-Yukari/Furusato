<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Request
     */
    public function index(Request $request)
    {
        // 存在する郵便番号のみ実装
        $zip = $request["zip"];
        // API https://postcode.teraren.com/
        // [例] https://postcode.teraren.com/postcodes/9200226.json
        $response = Http::get('https://postcode.teraren.com/postcodes/' . $zip . ".json");

        if ($response->successful()) {
            // リクエストが成功した場合の処理
            $responseData = $response->json(); // JSONレスポンスを取得し、配列の形で返却
        } else {
            // リクエストが失敗した場合の処理 statsu=200以外の場合
            $statusCode = $response->status();
            // エラーハンドリングなどを行う
        }

        return view('index', [
            'responseData' => $responseData ?? "",
            'statusCode' => $statusCode ?? "",
            'zip' => $zip ?? "",
        ]);
    }
}
