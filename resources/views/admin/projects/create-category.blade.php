<x-core::layouts.admin :title="__('New project category')">
    {!! BootForm::open()->action(route('admin::index-project_categories'))->addClass('form') !!}
    @include('admin::projects._form-category')
    {!! BootForm::close() !!}
</x-core::layouts.admin>
