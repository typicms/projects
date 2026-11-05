<?php

declare(strict_types=1);

namespace TypiCMS\Modules\Projects\Composers;

use Illuminate\Support\Facades\Gate;
use Illuminate\View\View;
use TypiCMS\Modules\Sidebar\SidebarGroup;
use TypiCMS\Modules\Sidebar\SidebarItem;
use TypiCMS\Modules\Sidebar\SidebarManager;

class SidebarViewComposer
{
    public function compose(View $view): void
    {
        $sidebar = $view->offsetGet('sidebar');

        if (! $sidebar instanceof SidebarManager) {
            return;
        }

        if (Gate::denies('read projects')) {
            return;
        }

        $sidebar->group(
            __(config()->string('typicms.modules.projects.sidebar.group', 'Content')),
            function (SidebarGroup $group): void {
                $group->id = 'content';
                $group->weight = 30;
                $group->addItem(
                    __(config()->string('typicms.modules.projects.sidebar.label', 'Projects')),
                    function (SidebarItem $item): void {
                        $item->id = 'projects';
                        $item->icon = config()->string('typicms.modules.projects.sidebar.icon');
                        $item->weight = config()->integer('typicms.modules.projects.sidebar.weight');
                        $item->route('admin::index-projects');
                    },
                );
            },
        );
    }
}
