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

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                </button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            @foreach($sub_categories as $sub_category)
                @if($main_category->id == $sub_category->parent)
                <div class="comment-text">
                    -- {{  $sub_category->name  }}
                </div>
                @endif
            @endforeach
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        @endif
        @endforeach
        

</section>

@endsection


       