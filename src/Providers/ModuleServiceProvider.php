<?php

declare(strict_types=1);

namespace TypiCMS\Modules\Projects\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Override;
use TypiCMS\Modules\Core\Models\Tag;
use TypiCMS\Modules\Projects\Composers\SidebarViewComposer;
use TypiCMS\Modules\Projects\Models\Project;

class ModuleServiceProvider extends ServiceProvider
{
    #[Override]
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__.'/../config/projects.php', 'typicms.modules.projects');
        $this->mergeConfigFrom(__DIR__.'/../config/project_categories.php', 'typicms.modules.project_categories');
    }

    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/projects.php');

        $this->loadViewsFrom([
            resource_path('views/admin'),
            __DIR__.'/../../resources/views/admin',
        ], 'admin');

        $this->loadViewsFrom([
            resource_path('views/public'),
            __DIR__.'/../../resources/views/public',
        ], 'public');

        $this->publishes([
            __DIR__.'/../../database/migrations/create_project_categories_table.php.stub' => getMigrationFileName(
                'create_project_categories_table',
            ),
            __DIR__.'/../../database/migrations/create_projects_table.php.stub' => getMigrationFileName(
                'create_projects_table',
            ),
        ], 'typicms-migrations');
        $this->publishes([
            __DIR__.'/../../resources/views/admin/projects' => resource_path('views/admin/projects'),
        ], ['typicms-views', 'typicms-admin-views', 'typicms-admin-projects-views']);
        $this->publishes([
            __DIR__.'/../../resources/views/public/projects' => resource_path('views/public/projects'),
        ], ['typicms-views', 'typicms-public-views', 'typicms-public-projects-views']);
        $this->publishes([__DIR__.'/../../resources/scss' => resource_path('scss')], 'typicms-resources');

        View::composer('admin::core._sidebar', SidebarViewComposer::class);

        // A project have tags.
        Tag::resolveRelationUsing('projects', fn ($tag) => $tag->morphedByMany(Project::class, 'taggable'));

        // Add the page in the view.
        View::composer('public::projects.*', function ($view): void {
            $view->page = getPageLinkedToModule('projects');
        });
    }
}
