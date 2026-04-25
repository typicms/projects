@extends('admin::core.master')

@section('title', __('New project category'))

@section('content')
    {!! BootForm::open()->action(route('admin::index-project_categories'))->addClass('form') !!}
    @include('admin::projects._form-category')
    {!! BootForm::close() !!}
@endsection
