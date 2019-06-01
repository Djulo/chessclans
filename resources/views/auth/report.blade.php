@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Report') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profile.reported') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Reporting user') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" readonly class="form-control @error('name') is-invalid @enderror" name="name" value="<?php echo($user[0]->name); ?>" required autocomplete="name" autofocus>

                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Reason') }}</label>

                            <div class="col-md-6">
<!--                                 <input id="" type="textarea" row="3" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
 -->                                <textarea class="form-control" value="" rows="3" name='reason'></textarea>
                                
                            </div>
                        </div>
                        



                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Report') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
