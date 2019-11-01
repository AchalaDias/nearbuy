@extends('layouts.admin-panel')
@section('content')
<section class="content">
<div class="col-md-12">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Category</h3>
            </div>
            <category-edit :category_data="{{ json_encode($category_data) }}" ></category-edit>
          </div>
        </div>
</section>
@endsection