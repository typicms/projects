<x-core::layouts.admin :title="$model->presentTitle()" :model="$model">
    {!! BootForm::open()->put()->action(route('admin::update-project_category', $model->id))->addClass('form') !!} {!! BootForm::bind($model) !!}
    @include('admin::projects._form-category')
    {!! BootForm::close() !!}
</x-core::layouts.admin>
