@extends('admin::core.master')

@section('title', $model->presentTitle())

@section('content')
    {!! BootForm::open()->put()->action(route('admin::update-project_category', $model->id))->addClass('form') !!}
    {!! BootForm::bind($model) !!}
    @include('admin::projects._form-category')
    {!! BootForm::close() !!}
@endsection
