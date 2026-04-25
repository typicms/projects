<ul class="project-list-list">
    @foreach ($items as $project)
        @include('public::projects._list-item')
    @endforeach
</ul>
