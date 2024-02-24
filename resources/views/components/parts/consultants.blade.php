<div style="max-width:500px;">
    <div class="h5 fw-bold text-end border-bottom">担当コンサルタント一覧</div>
    <div class="d-flex flex-wrap justify-content-end gap-3">
        @foreach($consultants as $consultant)
            @if ($consultant->admin && !$consultant->admin->trashed())
                <div>
                    {{ $consultant->admin->name }}
                </div>
            @endif
        @endforeach
    </div>
</div>
