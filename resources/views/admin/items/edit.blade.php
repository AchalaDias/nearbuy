@extends('layouts.admin-panel')
@section('content')
<section class="content">
<div class="col-md-12">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Category</h3>
            </div>
            <items-edit :edit_item="{{ json_encode($item) }}" :main_categories= "{{ json_encode($main_categories) }}" :sub_categories= "{{ json_encode($sub_categories) }}" ></items-edit>
          </div>
        </div>
</section>
@endsection