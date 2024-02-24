@extends('layouts.producer.app')

@section('content')
<div class="container">
    <x-parts.basic_card_layout>
        <x-slot name="cardHeader">
            <h4 class="my-2">一覧：{{ $producers->total() . '件中' . $producers->firstItem() . '-' . $producers->lastItem() }}件</h4>
            <a href="{{ route('producer.producers.create') }}" class="btn btn-primary">作成する</a>
        </x-slot>
        <x-slot name="cardBody">
            <x-parts.basic_table_layout>
                <x-slot name="thead">
                    <tr>
                        <th scope="col" class="text-nowrap">タイトル</th>
                        <th scope="col" class="text-nowrap">作成日</th>
                        <th scope="col" class="text-nowrap">編集</th>
                        <th scope="col" class="text-nowrap">削除</th>
                    </tr>
                </x-slot>
                <x-slot name="tbody">
                    @if($producers->isNotEmpty())
                        @foreach($producers as $producer)
                            <tr>
                                <td class="text-nowrap px-2"><a href="{{ route('producer.producers.show', $producer) }}">{{ $producer->title }}</a></td>
                                <td class="text-nowrap px-2">{{ $producer->created_at }}</td>
                                <td class="text-nowrap px-2"><a href="{{ route('producer.producers.edit', $producer) }}" class="btn btn-sm btn-outline-secondary">編集</a></td>
                                <td class="text-nowrap px-2">
                                    <form action="{{ route('producer.producers.destroy', $producer) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('本当に削除しますか？')"
                                        >削除</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </x-slot>
            </x-parts.basic_table_layout>
            <div class="row justify-content-center">
                {{ $producers->links('pagination::bootstrap-4') }}
            </div>
        </x-slot>
    </x-parts.basic_card_layout>
</div>
@endsection
