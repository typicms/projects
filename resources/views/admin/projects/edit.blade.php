@extends('admin::core.master')

@section('title', $model->presentTitle())

@section('content')
    {!! BootForm::open()->put()->action(route('admin::update-project', $model->id))->addClass('form') !!}
    {!! BootForm::bind($model) !!}
    @include('admin::projects._form')
    {!! BootForm::close() !!}
@endsection
