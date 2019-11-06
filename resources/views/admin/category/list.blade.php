@extends('layouts.admin-panel')
@section('content')
    <section class="content-header">
        <h1>
            Categories 
            <a href="{{ route('admin.category.create') }}" class="btn bg-maroon btn-flat margin">Create New Category</a>
        </h1>
        @foreach($main_categories as $main_category)
        @if($main_category->id != 1)
        <div class="col-md-5">
            <div class="box box-default collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{  $main_category->name }}</h3>
                    @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
                    <div class="btn-group pull-right">
                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ route('admin.category.edit', ['id' => $main_category->id ]) }}">Edit</a></li>
                            <li> 
                                <a onclick="delUser( {{ $main_category->id }} )"  data-toggle="modal" data-target="#modal-info">
                                    Delete
                                </a>
                            </li>
                        </ul>
                    </div>
                    @endif
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    @foreach($sub_categories as $sub_category)
                        @if($main_category->id == $sub_category->parent)
                        <div class="comment-text">
                            -- {{  $sub_category->name  }}
                        </div>
                            @if(Auth::user()->id ==  $sub_category->user_id)
                            <div class="timeline-footer">
                                <a href="{{ route('admin.category.edit', ['id' => $sub_category->id ]) }}" class="btn btn-primary btn-xs">Edit</a>
                                <!-- <a class="btn btn-danger btn-xs">Delete</a> -->
                            </div>
                            @endif
                        @endif
                @endforeach
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </section>
@endsection


       