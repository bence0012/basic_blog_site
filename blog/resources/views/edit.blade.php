@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit post') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update',[$id]) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                        <div class="row mb-0">
                            <label for="Title" class="row justify-content-center">Title</label>
                        </div>
                        <div class="row mb-3">
                            <input id="title" type="title" class="form-control" name="title" required="" autocomplete="title" autofocus="" value={{ __($post['title']) }}>
                        </div>
                        <div class="row mb-0">
                            <label for="content" class="row justify-content-center">Content</label>
                        </div>
                        <div class="row mb-3">
                            <textarea id="content" type="content" class="form-control" name="content" required="" autocomplete="content" autofocus="" value={{ __($post['content']) }}></textarea>
                        </div>
                        <div class="row mb-0">
                            <button type="submit">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
