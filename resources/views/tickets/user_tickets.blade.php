@extends('layouts.app')

@section('title', 'Мои служебки')

@section('content')
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-ticket">Мои служебные записки</i>
            </div>

            <div class="panel-body">
                @if ($tickets->isEmpty())
                    <p>У Вас нет созданных служебных записок</p>
                @else
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Категория</th>
                                <th>Название</th>
                                <th>Статус</th>
                                <th>Обновленна</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tickets as $ticket)
                            <tr>
                                <td>
                                    @foreach($categories as $category)
                                        @if($category->id === $ticket->category_id)
                                            {{$category->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{url('tickets/'.$ticket->ticket_id)}}">
                                        #{{$ticket->ticket_id}} - {{$ticket->title}}
                                    </a>
                                </td>
                                <td>
                                    @if($ticket->status === 'Открыта')
                                        <span class="label label-success">{{$ticket->status}}</span>
                                    @else
                                        <span class="label label-danger">{{$ticket->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    {{$ticket->updated_at}}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$tickets->render()}}
                @endif
            </div>
        </div>
    </div>
</div>

@endsection