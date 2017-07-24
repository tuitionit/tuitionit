<?php

namespace App\Http\Composers;

use Illuminate\View\View;

/**
 * Class QuickLinksComposer.
 */
class QuickLinksComposer
{
    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('links', [
            [
                'name' => 'Add Student',
                'route' => 'admin.students.create',
            ],
            [
                'name' => 'Add Student',
                'route' => 'admin.students.create',
            ],
            [
                'name' => 'Add Student',
                'route' => 'admin.students.create',
            ],
            [
                'name' => 'Add Student',
                'route' => 'admin.students.create',
            ],
        ]);
    }
}
