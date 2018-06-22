@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are Log inz
                   
                    @if($messages)
                    @foreach($messages  as $message)
                    @foreach($message  as $info)
                    <div class="jumbotron">
                        <div class="media">
                            <div class="media-body">             
                            <h2 class="media-heading"> {{$info['sender']}}</h2>  
                            <p  class="text-left"> Message : {{ $info['content'] }} </p> 
                            <ul class="list-inline list-unstyled">
                            <li><span><i class="glyphicon-calendar"></i> {{ $info['sent'] }}</span></li> 
                            </ul>
                            </div>
                        </div>
                    </div>                  
                    @endforeach
                    @endforeach
                    @endif                 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
