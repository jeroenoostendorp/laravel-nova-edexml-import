<?php

namespace JeroenOostendorp\LaravelNovaEdexmlImport;

use Illuminate\Http\Request;
use Laravel\Nova\Exceptions\NovaException;
use Laravel\Nova\Menu\MenuSection;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class LaravelNovaEdexmlImport extends Tool
{
    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::script('laravel-nova-edexml-import', __DIR__.'/../dist/js/tool.js');
        Nova::style('laravel-nova-edexml-import', __DIR__.'/../dist/css/tool.css');
    }

    /**
     * Build the menu that renders the navigation links for the tool.
     *
     * @throws NovaException
     */
    public function menu(Request $request): mixed
    {
        return MenuSection::make('EDEXML import')
            ->path('/laravel-nova-edexml-import')
            ->icon('upload');
    }
}
