@extends('admin::core.master')

@section('title', __('New project'))

@section('content')
    {!! BootForm::open()->action(route('admin::index-projects'))->addClass('form') !!}
    @include('admin::projects._form')
    {!! BootForm::close() !!}
@endsection
