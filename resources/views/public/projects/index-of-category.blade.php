@extends('public::pages.master')

@section('title', $category->title . ' – ' . __('Projects') . ' – ' . $websiteTitle)
@section('ogTitle', $category->title)
@section('ogImage', $category->ogImageUrl())
@section('bodyClass', 'body-projects body-projects-index body-page body-page-' . $page->id)

@section('page')
    <div class="page-body">
        <div class="page-body-container">
            @include('public::pages._main-content', ['page' => $page])
            @include('public::files._document-list', ['model' => $page])
            @include('public::files._image-list', ['model' => $page])

            @includeWhen($models->count() > 0, 'public::projects._list', ['items' => $models])
        </div>
    </div>
@endsection
