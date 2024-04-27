@extends('layouts.test_app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if ($zip !== "")
                    <div class="card-header">「{{ $zip }}」 の検索結果</div>
                @else    
                    <div class="card-header">{{ __('TEST Page') }}</div>
                @endif 

                <form method="POST" action="{{ route('index') }}">
                        @csrf
                    <div class="row m-3">
                        <label for="zip" class="col-md-4 col-form-label text-md-end">{{ __('zip') }}</label>

                        <div class="col-md-6">
                            <input id="zip" type="text" class="form-control @error('zip') is-invalid @enderror" name="zip" value="{{ old('zip') }}" autocomplete="zip" autofocus>

                            @error('zip')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('push') }}
                            </button>
                        </div>
                    </div>
                </form>
                
                <div class="row m-3">
                        @if ($responseData !== "")
                        <label for="zip" class="col-md-4 text-end">{{ __('検索結果') }}</label>

                        <div class="col-md-6">
                        
                                {{ $responseData["prefecture"] }}{{ $responseData["city"] }}{{ $responseData["suburb"] }}
                            @endif

                        </div>
                    </div>

            </div>
        </div>
    </div>
</div>
@endsection
