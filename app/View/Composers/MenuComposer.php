<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Menu;
class MenuComposer
{
    /**
     * The user repository implementation.
     *
     * @var \App\Repositories\UserRepository
     */
    protected $users;

    /**
     * Create a new profile composer.
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $menus = Menu::select('id', 'name', 'parent_id','is_home','slug')->where('status', 1)->orderByDesc('id')->get();

        $view->with('menus', $menus);
    }
}