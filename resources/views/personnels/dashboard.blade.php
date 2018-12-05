@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Personnel's</strong> Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Welcome Mr./Mst : <strong>{{ $user }}</strong></p>
                    <p></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
