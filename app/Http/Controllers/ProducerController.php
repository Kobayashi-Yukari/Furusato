<?php

namespace App\Http\Controllers\Producer;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProducerController\StoreRequest;
use App\Http\Requests\ProducerController\UpdateRequest;
use App\Models\Producer;
use Illuminate\Http\Request;


class ProducerController extends Controller
{
    private Producer $producer;

    /**
     * @param Producer $producer
     */
    public function __construct(Producer $producer)
    {
        $this->producer = $producer;
    }

    /**
     * 一覧
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('producers.index', [
            'producers' => Producer::latest()->paginate(12),
        ]);
    }

    /**
     * 登録フォーム表示
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {        
        return view('producers.create');
    }

    /**
     * 詳細表示
     *
     * @return \Illuminate\View\View
     */
    public function show(Producer $producer)
    {        
        return view('producers.show', [
            'producer' => $producer,
        ]);
    }

    /**
     * 登録
     *
     * @param StoreRequest $request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $this->producer->fill($request->substitutable())->save();

        return to_route('producers.index')->with('status', '作成しました');
    }

    /**
     * 編集フォーム表示
     *
     * @return \Illuminate\View\View
     */
    public function edit(Producer $producer)
    {
        return view('producers.edit', [
            'producer' => $producer,
        ]);
    }

    /**
     * 更新
     *
     * @param UpdateRequest $request
     * @param Producer $producer
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Producer $producer)
    {
        $producer->fill($request->substitutable())->save();

        return back()->with('status', '更新しました');
    }

    /**
     * 削除
     *
     * @param Producer $producer
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Producer $producer)
    {
        $producer->delete();

        return to_route('producers.index')->with('status', '削除しました');
    }
}