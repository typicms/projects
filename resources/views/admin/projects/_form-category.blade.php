<x-core::header :$model :back-url="$model->indexUrl()" :back-label="__('Categories')" :default-title="__('New project category')" />

<div class="form-body">
    <x-core::form-errors />

    <div class="row">
        <div class="col-lg-8">
            <x-core::title-and-slug-fields />
            <div class="mb-3">{!! TranslatableBootForm::hidden('status')->value(0) !!} {!! TranslatableBootForm::checkbox(__('Published'), 'status') !!}</div>
        </div>
        <div class="col-lg-4">
            <div class="right-column">
                <file-manager></file-manager>
                <file-field type="image" field="image_id" :init-file="{{ $model->image ?? 'null' }}"></file-field>
                <file-field type="image" field="og_image_id" :init-file="{{ $model->ogImage ?? 'null' }}" label="@lang('Social Share Image')" hint="1200 × 630 px"></file-field>
            </div>
        </div>
    </div>
</div>
