@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ( $posts  as $subitem)
            
            
                <div class="card">
                    <div class="card-header">{{ __($subitem['title']) }}</div>

                    <div class="card-body">
                        

                        
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection