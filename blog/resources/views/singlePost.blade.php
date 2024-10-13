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
                    
                    <div>
                        Created at: {{ $post['created_at']->format('d M Y - H:i:s') }}
                    </div>
                    @auth
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
                    @endauth
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('comment',[$post['id']]) }}">
                        @csrf
                        <div class="row mb-0">
                            <label for="comment" class="row justify-content-center">Comment</label>
                        </div>
                        <div class="row mb-3">
                            <textarea id="comment" type="content" class="form-control" name="comment" required="" autocomplete="comment" autofocus="" value=""></textarea>
                        </div>
            
                        <button type="submit" >Add comment</button>
                    </form>
                </div>
            </div>
            @foreach ($comments  as $comment)
                <div class="card">
                    <div class="card-header">
                        <div class="row justify-content-center">
                            @if($comment['user_id']==null)
                                by: guest user
                            @else
                                by: {{ __($comment['user_id']['name']) }}
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            {{ __($comment['comment']) }}
                        </div>
                        <div>
                            Created at: {{ $post['created_at']->format('d M Y - H:i:s') }}
                        </div>
                        <form method="POST" action="{{ route('delcomment',[$post['id'],$comment['id']]) }}">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                
                            <button type="submit" >Delete comment</button>
                
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection