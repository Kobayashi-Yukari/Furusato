{{-- 例 <x-parts.required_badge class="追加したいクラス名"/> --}}
<span class="badge bg-danger ms-2 @isset($class) {{ $class }} @endisset">必須</span>