@extends('layouts.app')

@section('title','Все документы')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-ticket">Документы</i>
                </div>
                <div class="panel-body">
                    @if ($tickets->isEmpty())
                        <p>Нет никаких документов</p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Категория</th>
                                    <th>Название</th>
                                    <th>Статус</th>
                                    <th>Обновленна</th>
                                    <th style="text-align: center;" colspan="2">Действие</th>
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
                                    <a href="{{ url('tickets/'.$ticket->ticket_id)}}">
                                        #{{$ticket->ticket_id}} - {{$ticket->title}}
                                    </a>
                                </td>
                                <td>
                                    @if ($ticket->status === 'Открыта')
                                        <span class="label label-success">{{$ticket->status}}</span>
                                    @else
                                        <span class="label label-danger">{{$ticket->status}}</span>
                                    @endif
                                </td>
                                <td>
                                    {{$ticket->updated_at}}
                                </td>
                                <td>
                                    @if ($ticket->status === 'Открыта')
                                        <a href="{{url('tickets/'.$ticket->tiket_id)}}" class="btn btn-primary">Коментировать</a>
                                    @else
                                        <a href="{{url('tickets/'.$ticket->tiket_id)}}" class="btn btn-primary disabled">Коментировать</a>
                                    @endif
                                </td>
                                <td>
                                    @if ($ticket->status === 'Открыта')
                                    <form action="{{url('admin/close_ticket/'.$ticket->ticket_id)}}" method="POST">
                                        {!! csrf_field() !!}
                                        <button type="submit" class="btn btn-primary">Закрыть</button>
                                    </form>
                                    @else
                                        <button type="submit" class="btn btn-primary disabled">Закрыть</button>
                                    @endif
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