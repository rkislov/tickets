@extends('layouts.app')

@section('title', 'Новая служебная запиская')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Новая служеная записка</div>

                <div class="panel-body">
                    @include('includes.flash')

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('store_ticket') }}">
                        {!! csrf_field() !!}
                        <div class="form-group{{$errors->has('title')}} ? ' has-error' : ''}}">
                            <label for="title" class="col-md-4 control-label">Название</label>
                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" value="{{old('title')}}">

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('title')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{$errors->has('category')}} ? ' has-error' : ''}}">
                            <label for="category" class="col-md-4 control-label">Категория</label>
                            <div class="col-md-6">
                                <select id="category" type="category" class="form-control" name="category"  style="height: 30px;">
                                    <option value="">Выберите категорию</option>
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('category'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('category')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{$errors->has('priority')}} ? ' has-error' : ''}}">
                            <label for="priority" class="col-md-4 control-label">Приоритет</label>
                            <div class="col-md-6">
                                <select id="priority" type="" class="form-control" name="priority" style="height: 30px;">
                                    <option value="">Выберите приоритет</option>
                                    <option value="low">Низкий</option>
                                    <option value="medium">Средний</option>
                                    <option value="high">Высокий</option>
                                </select>
                                @if ($errors->has('priority'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('priority')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{$errors->has('message')}} ? ' has-error' : ''}}">
                            <label for="message" class="col-md-4 control-label">Сообщение</label>
                            <div class="col-md-6">
                                <textarea rows="10" id="message" class="form-control" name="message"></textarea>

                                @if ($errors->has('message'))
                                    <span class="help-block">
                                        <strong>{{$errors->first('message')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-ticket"></i> Создать
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection