@extends('layouts.producer.app')

@section('content')
<div class="container">
    <x-parts.basic_card_layout>
        <x-slot name="cardHeader">
            <h4 class="my-2">生産者詳細ページ</h4>
        </x-slot>
        <x-slot name="cardBody">
            <p>{{ $producer->title }}</p>
        </x-slot>
    </x-parts.basic_card_layout>
</div>
@endsection
