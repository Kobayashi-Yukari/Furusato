<div
    class="radio-horizon d-flex flex-column flex-md-row align-items-center align-items-md-end justify-content-center gap-4">
    @isset($textLeft)
        <div class="text lh-1">{{ $textLeft }}</div>
    @else
        <div class="text lh-1">減っている</div>
    @endisset
    <div class="radio-wrap d-flex flex-column flex-md-row gap-3">
        @php
            $data = [1, 2, 3, 4, 5];
        @endphp
        @foreach ($data as $k => $v)
            <label
                class="radio-horizon-item d-flex flex-md-column gap-2 align-items-center @error($name) is-invalid @enderror">
                <span class="radio-horizon-item-text">{{ $v }}</span>
                <input type="radio" name="{{ $name }}" value="{{ $v }}"
                    @isset($checked)
                    @if (old($name, $checked) == $v) checked @elseif($loop->iteration == 1 && empty($noChecked)) checked @endif
                @else
                    @if (old($name) == $v) checked @elseif($loop->iteration == 1 && empty($noChecked)) checked @endif
                @endisset>
            </label>
        @endforeach
    </div>
    @isset($textRight)
        <div class="text lh-1">{{ $textRight }}</div>
    @else
        <div class="text lh-1">増えている</div>
    @endisset
</div>
