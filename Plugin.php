<?php namespace SerenityNow\Civics;

use Backend;
use System\Classes\PluginBase;

/**
 * Civics Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Civics',
            'description' => 'Prepare for the US Citizenship/Naturalization Test',
            'author'      => 'SerenityNow',
            'icon'        => 'icon-graduation-cap'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return [
            'SerenityNow\Civics\Components\Questionnaire' => 'myQuestionnaire',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'serenitynow.civics.some_permission' => [
                'tab'   => 'Civics',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'civics' => [
                'label'       => 'Civics',
                'url'         => Backend::url('serenitynow/civics/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['serenitynow.civics.*'],
                'order'       => 500,
            ],
        ];
    }

}
