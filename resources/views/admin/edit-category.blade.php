@extends('core::admin.master')

@section('title', $model->presentTitle())

@section('content')
    {!! BootForm::open()->put()->action(route('admin::update-project_category', $model->id))->addClass('form') !!}
    {!! BootForm::bind($model) !!}
    @include('projects::admin._form-category')
    {!! BootForm::close() !!}
@endsection
