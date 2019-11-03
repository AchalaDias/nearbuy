@extends('layouts.admin-panel')
@section('content')
<section class="content">
<div class="col-md-12">
<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Category</h3>
            </div>
            <category-create :main_categories= "{{ json_encode($main_categories) }}" :sub_categories= "{{ json_encode($sub_categories) }}"  :user="{{ Auth::user() }}" ></category-create>
          </div>
        </div>
</section>
@endsection