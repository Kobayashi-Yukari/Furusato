<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class UserController extends Controller
{
    /**
    * @var string
    */
    // private User $user;


    /**
     * @param  User $user
     */
    // public function __construct(User $user)
    // {
    //     $this->user = $user;
    // }

    /**
     * Display a listing of the resource.
     * 
     * User 情報一覧
     * 
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return view('user.users.index', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * ユーザー情報編集ページ
     */
    public function edit(User $user)
    {
        if (auth()->user()->id !== $user->id) {
            return redirect()->back();
        }
        return view('user.users.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if (isset($request->name) === false || isset($request->email) === false) {
            return redirect()->back()->with('status', '空欄の入力欄があります');
        }
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->save();
        return to_route('user.users.index', ['user' => $user])->with('status', 'データを更新しました');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
