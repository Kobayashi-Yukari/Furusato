@extends('layouts.user.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="my-2">ユーザー情報編集画面</h4>
                    <form id="form" method="POST" action="{{ route('user.users.update', $user) }}"  enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-dark">
                        更新する
                    </button>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="form-section-wrapper">
                        <div class="form-item-wrapper d-flex flex-column gap-4">
                        
                            <div class="form-item d-flex flex-column flex-md-row gap-2 gap-md-5">
                                <label class="d-flex align-items-center gap-2 flex-shrink-0 col-md-2"><span>ユーザー名</span></label>
                                @include('components.form.text', [
                                    'name' => 'name',
                                    'value' => $user->name,
                                ])
                                @include('components.form.error', [
                                    'name' => 'name',
                                ])
                            </div>
                            <div class="form-item d-flex flex-column flex-md-row gap-2 gap-md-5">
                                <label class="d-flex align-items-center gap-2 flex-shrink-0 col-md-2"><span>メールアドレス</span></label>
                                @include('components.form.text', [
                                    'name' => 'email',
                                    'value' => $user->email,
                                ])
                                @include('components.form.error', [
                                    'name' => 'email',
                                ])
                            </div>
                            <!-- <div class="form-item d-flex flex-column flex-md-row gap-2 gap-md-5">
                                <label class="d-flex align-items-center gap-2 flex-shrink-0 col-md-2"><span>パスワード</span></label>
                                @include('components.form.text', [
                                    'name' => 'password',
                                ])
                                @include('components.form.error', [
                                    'name' => 'password',
                                ])
                            </div> -->

                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

@endsection
