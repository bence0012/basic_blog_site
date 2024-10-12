@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-center">
                        by: {{ __($poster) }}
                    </div>
                    <div class="row justify-content-center">
                        {{ __($post['title']) }}
                    </div>
                </div>

                <div class="card-body">
                {{ __($post['content']) }}

                <form method="POST" action="{{ route('getEdit',[$post['id']]) }}">
                    {{ csrf_field() }}
                    {{ method_field('GET') }}

        
                    <button type="submit" >Edit post</button>
        
                 </form>
            
                <form method="POST" action="{{ route('delete',[$post['id']]) }}">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

        
                    <button type="submit" >Delete post</button>
        
                 </form>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection