@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create new comment') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ route('post') }}">
                        @csrf

                        <div class="row mb-0">
                            <label for="Title" class="row justify-content-center">Title</label>
                        </div>
                        <div class="row mb-3">
                            <input id="title" type="title" class="form-control" name="title" required="" autocomplete="title" autofocus="" value="">
                        </div>
                        <div class="row mb-0">
                            <label for="content" class="row justify-content-center">Content</label>
                        </div>
                        <div class="row mb-3">
                            <textarea id="content" type="content" class="form-control" name="content" required="" autocomplete="content" autofocus="" value=""></textarea>
                        </div>
                        <div class="row mb-0">
                            <button type="submit">Post</button>
                        </div>
                    </form>
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
