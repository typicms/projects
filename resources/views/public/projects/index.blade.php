<x-core::layouts.page :page="$page" :body-class="'body-projects body-projects-categories body-page body-page-' . $page->id">
    <div class="page-body">
        <div class="page-body-container">
            @include('public::pages._main-content', ['page' => $page])
            @include('public::files._document-list', ['model' => $page])
            @include('public::files._image-list', ['model' => $page])

            @if ($categories->count() > 0)
                <ul class="category-list-list">
                    @foreach ($categories as $category)
                        <li class="category-list-item">
                            <a class="category-list-item-link" href="{{ route(app()->getLocale() . '::projects-category', [$category->slug]) }}">
                                <div class="category-list-item-title">{{ $category->title }}</div>
                                <img class="category-list-item-image" src="{{ imageOrDefault($category->image, 600, 400) }}" width="300" height="200" alt="{{ $category->image?->alt_attribute }}" />
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
</x-core::layouts.page>
