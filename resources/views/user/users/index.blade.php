@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="my-2">ユーザー情報画面</h4>
                    <a href="{{ route('user.users.edit', ['user' => $user]) }}" class="btn btn-primary">編集する
                    </a>    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <!-- <th scope="col"></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row"></th>
                        <td>ユーザー名</td>
                        <td>{{ $user->name }}</td>
                        <td></td>
                        </tr>
                        <tr>
                        <th scope="row"></th>
                        <td>メールアドレス</td>
                        <td>{{ $user->email }}</td>
                        <td></td>
                        </tr>
                        <!-- <tr>
                        <th scope="row"></th>
                        <td>パスワード</td>
                        <td>xxxxxx</td>
                        </tr> -->
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
