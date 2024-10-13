@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ( $posts  as $subitem)
            
            
                <div class="card">
                    <div class="card-header">{{ __($subitem['title']) }}</div>

                    <div class="card-body">
                        
                    <form method="POST" action="{{ route('singlePost',[$subitem['id']]) }}">
                        {{ csrf_field() }}
                        {{ method_field('GET') }}

            
                        <button type="submit">Check post</button>
        
                    </form>
                        
                    </div>
                </div>
            @endforeach
                <form method="POST" action="{{ route('create')}}">
                    {{ csrf_field() }}
                    {{ method_field('GET') }}

                    @auth
                        <button type="submit">Create post</button>
                    @endauth
                </form>
        </div>
    </div>
</div>
@endsection