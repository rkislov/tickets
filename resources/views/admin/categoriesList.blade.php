@extends('layouts.app')

@section('title', 'Категории')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-tasks"> Категории</i>
                </div>

                <div class="panel-body">
                    <div id="category_form">
                    <form>
                        <div class="input-group margin-bottom-sm">
                            <input class="form-control" type="text" name="name" placeholder="Название категории">

                            <span class="input-group-addon">
                                <a href="" class="add_category_button">
                                    <i class="fa fa-envelope-o fa-plus"></i>
                                </a>
                            </span>

                        </div>

                        <label class="error" for="name" id="name_error" style="color: red;">поле газвание не должно быть пустым</label>
                    </form>
                    </div>
                    @if ($categories->isEmpty())
                        <p>У Вас нет созданных служебных записок  </p>
                    @else
                        <table class="table">
                            <thead>
                            <tr>

                                <th>Название</th>
                                <th>Обновленна</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>

                                        <td>{{$category->name}}</td>
                                        <td>{{$category->updated_at}}</td>
                                        <td><a href="javascript:;" class="delete " rel="{{$category->id}}">
                                                <i class="fa fa-2x fa-times-circle text-danger"></i>
                                            </a> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$categories->render()}}
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.error').hide();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".add_category_button").click(function (e) {
                e.preventDefault();
                $('.error').hide();

                var name = $("input[name=name]").val();

                if(name == ""){
                    $("label#name_error").show();
                    $("input#name").focus();
                    return false;
                }

                $.ajax({
                    type: 'POST',
                    url: "{!! route('categories_add')!!}",
                    data: {name: name},
                    complete: function() {
                        location.reload();
                    }

                });


            });

            $(".delete").on('click', function () {
                let id = $(this).attr("rel");
                $.ajax({
                    type: "DELETE",
                    url: "{!! route('categories_delete') !!}",
                    data: {_token:"{{csrf_token()}}", id:id},
                    complete: function () {
                        location.reload();
                    }
                });
            });

        });
    </script>
@endsection