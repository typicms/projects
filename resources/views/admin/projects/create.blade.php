<x-core::layouts.admin :title="__('New project')">
    {!! BootForm::open()->action(route('admin::index-projects'))->addClass('form') !!}
    @include('admin::projects._form')
    {!! BootForm::close() !!}
</x-core::layouts.admin>
