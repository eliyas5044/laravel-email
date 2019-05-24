@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group">
                        @foreach($emails as $email)
                      <li class="list-group-item">{{$email->email}}</li>
                      @endforeach
                    </ul>
                    <hr>
                    <a href="{{url('send-emails')}}" class="btn btn-primary">Send Emails</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
