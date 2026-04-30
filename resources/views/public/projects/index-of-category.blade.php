<x-core::layouts.page
    :page="$page"
    :title="$category->title . ' – ' . __('Projects') . ' – ' . websiteTitle()"
    :og-title="$category->title"
    :og-image="$category->ogImageUrl()"
    :body-class="'body-projects body-projects-index body-page body-page-' . $page->id"
>
    <div class="page-body">
        <div class="page-body-container">
            @include('public::pages._main-content', ['page' => $page])
            @include('public::files._document-list', ['model' => $page])
            @include('public::files._image-list', ['model' => $page])

            @includeWhen($models->count() > 0, 'public::projects._list', ['items' => $models])
        </div>
    </div>
</x-core::layouts.page>
