@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 col-md-offset-1">
                <div class="card">
                    <div class="card-header">настройки</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif


                          <table class="table">
                             <thead>
                                <tr >
                                    <th class="text-center">Класс</th>
                                    <th class="text-center">Количество</th>
                                    <th class="text-center">действия</th>
                                </tr>
                             </thead>
                              <tbody>
                              <tr>
                                  <td class="text-center">Пользователи </td>
                                  <td class="text-center"><strong class="">{{$users->count()}}</strong></td>
                                  <td class="text-center">
                                      <div class="btn-group">
                                          <a class="btn btn-success" href="#">
                                              <i class="fa  fa-plus-square-o"></i>
                                          </a>
                                          <a class="btn btn-info" href="{{route('users_list')}}">
                                              <i class="fa  fa-list-ol"></i>
                                          </a>
                                      </div>
                                  </td>

                              </tr>
                              <tr>
                                  <td class="text-center">Группы </td>
                                  <td class="text-center"><strong class="">{{$users->count()}}</strong></td>
                                  <td class="text-center">
                                      <div class="btn-group">
                                          <a class="btn btn-success" href="#">
                                              <i class="fa  fa-plus-square-o"></i>
                                          </a>
                                          <a class="btn btn-info" href="{{route('groups_list')}}">
                                              <i class="fa fa-list-ol"></i>
                                          </a>
                                      </div>
                                  </td>

                              </tr>
                              <tr>
                                  <td class="text-center" >Роли </td>
                                  <td class="text-center"><strong class="">{{$users->count()}}</strong></td>
                                  <td class="text-center">
                                      <div class="btn-group">
                                          <a class="btn btn-success" href="#">
                                              <i class="fa fa-plus-square-o"></i>
                                          </a>
                                          <a class="btn btn-info" href="{{route('roles_list')}}">
                                              <i class="fa  fa-list-ol"></i>
                                          </a>
                                      </div>
                                  </td>

                              </tr>
                              <tr>
                                  <td class="text-center">Типы документов </td>
                                  <td class="text-center"><strong class="">{{$categories->count()}}</strong></td>
                                  <td class="text-center">
                                      <div class="btn-group">
                                          <a class="btn btn-success" href="#">
                                              <i class="fa  fa-plus-square-o"></i>
                                          </a>
                                          <a class="btn btn-info" href="{{route('categories_list')}}">
                                              <i class="fa  fa-list-ol"></i>
                                          </a>
                                      </div>
                                  </td>

                              </tr>



                              </tbody>
                          </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')

@endsection
