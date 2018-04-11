@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Рабочая область</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                        @if (Auth::user()->is_admin)
                            <p>
                                Просмотреть все  <a href="{{ url('admin/tickets') }}">документы</a>
                            </p>
                        @else
                            <p>
                                Просмотреть свои <a href="{{ url('my_tickets') }}">документы</a> или <a href="{{ url('new_ticket') }}">создать новый</a>
                            </p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
