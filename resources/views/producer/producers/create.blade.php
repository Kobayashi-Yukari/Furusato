@extends('layouts.producer.app')

@section('content')
<div class="container">
    <x-parts.basic_card_layout>
        <x-slot name="cardHeader">
            <h4 class="my-2">生産者情報登録ページ</h4>
        </x-slot>
        <x-slot name="cardBody">
            <form method="POST" action="{{ route('producer.producers.store') }}"  enctype="multipart/form-data">
                @csrf
                
                <div class="row mb-3">
                    <label for="company_name" class="col-md-4 col-form-label text-md-end">会社名</label>
                    <div class="col-md-6">
                        @include('components.form.text', ['name' => 'company_name', 'required' => true])
                        @include('components.form.error', ['name' => 'company_name'])
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">代表者氏名</label>
                    <div class="col-md-6">
                        @include('components.form.text', ['name' => 'name', 'required' => true])
                        @include('components.form.error', ['name' => 'name'])
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="email" class="col-md-4 col-form-label text-md-end">メールアドレス</label>
                    <div class="col-md-6">
                        @include('components.form.text', ['name' => 'email', 'required' => true])
                        @include('components.form.error', ['name' => 'email'])
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="tel" class="col-md-4 col-form-label text-md-end">電話番号</label>
                    <div class="col-md-6">
                        @include('components.form.text', ['name' => 'tel', 'required' => true])
                        @include('components.form.error', ['name' => 'tel'])
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="postcode" class="col-md-4 col-form-label text-md-end">郵便番号</label>
                    <div class="col-md-6">
                        @include('components.form.text', ['name' => 'postcode', 'required' => true])
                        @include('components.form.error', ['name' => 'postcode'])
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="address" class="col-md-4 col-form-label text-md-end">住所</label>
                    <div class="col-md-6">
                        @include('components.form.text', ['name' => 'address', 'required' => true])
                        @include('components.form.error', ['name' => 'address'])
                    </div>
                </div>

                <div class="text-center my-4">
                    <button type="submit" class="btn btn-dark">
                        登録する
                    </button>
                </div>
            </form>
        </x-slot>
    </x-parts.basic_card_layout>
</div>
@endsection
