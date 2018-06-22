@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Messageboard</div>
                <div class="card-body">
                @if($message or 'not-exist')
                             
                @foreach($message as $info)
                <div class="jumbotron">
                    <div class="media">                           
                        <div class="media-body">                                  
                            <h2 class="media-heading">              {{ $info['reciever']}} </h2>  
                            <p  class="text-left">     Message :{{ $info['content'] }} </p>
                            <p class="text-right">      Sender :{{ $info['sender']}}</p>  
                            <ul class="list-inline list-unstyled"><li><span><i class="glyphicon-calendar"></i> {{ $info['created_at'] }}</span></li></ul> 
                        </div>                                                                              
                    </div>                      
                </div>
                @endforeach
                @endif
                {{ $message->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
