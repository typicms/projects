<?php

declare(strict_types=1);

use TypiCMS\Modules\Projects\Models\Project;

return [
    'model' => Project::class,
    'linkable_to_page' => true,
    'has_taxonomies' => true,
    'per_page' => 30,
    'llms_txt' => true,
    'order' => [
        'date' => 'desc',
    ],
    'sidebar' => [
        'icon' => '<i class="icon-shapes"></i>',
        'weight' => 60,
    ],
    'permissions' => [
        'read projects' => 'Read',
        'create projects' => 'Create',
        'update projects' => 'Update',
        'delete projects' => 'Delete',
    ],
];
