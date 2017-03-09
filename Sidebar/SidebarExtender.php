<?php

namespace Modules\Slider\Sidebar;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\User\Contracts\Authentication;

class SidebarExtender implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @param Menu $menu
     *
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('slider::sliders.title.sliders'), function (Item $item) {
                $item->icon('fa fa-picture-o');
                $item->weight(10);
                $item->route('admin.slider.slider.index');
                $item->authorize(
                    $this->auth->hasAccess('slider.sliders.index')
                );
            });
        });

        return $menu;
    }
}
