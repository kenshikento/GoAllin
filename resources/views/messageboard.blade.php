@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Messageboard</div>

                <div class="card-body">
                    @if(isset($messages))
                    @forelse($messages as $message)
                  

              
                    <div class="jumbotron">
                        <div class="media">
                            <div class="media-body">
                              @if(isset($message['friendinfo']))
                                <h2 class="media-heading">              {{ $message['friendinfo']->friendname}} </h2>  
                                    <p  class="text-left">     Message :{{ $message['userinfo']->content }} </p>
                                    <p class="text-right">      Sender :{{  $message['userinfo']->name}}</p>  

                                    <ul class="list-inline list-unstyled"><li><span><i class="glyphicon-calendar"></i> {{ $message['userinfo']->created_at }}</span></li>
                                    </ul> 
                            </div>
                        </div>
                    </div>
                            @else 
                            <p> takes two to tango </p>
                            @endif
                    
                    @empty 
                    <p>No messages sadly </p>

                    @endforelse    
                    @endif
                    <!--<p>No messages sadly </p>     -->        
                
                    
                

                </div>
            </div>
        </div>
    </div>
</div>
@endsection