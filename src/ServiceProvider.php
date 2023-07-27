<?php

namespace AdminDisqus;

use Admin\Controllers\Controller;
use Admin\Core\ConfigExtensionProvider;
use Admin\ExtendProvider;
use AdminDisqus\Components\DisqusComponent;
use AdminDisqus\Extension\Config;
use AdminDisqus\Extension\Install;
use AdminDisqus\Extension\Navigator;
use AdminDisqus\Extension\Permissions;
use AdminDisqus\Extension\Uninstall;
use Exception;

class ServiceProvider extends ExtendProvider
{
    /**
     * @var string
     */
    public static $name = "bfg/admin-disqus";

    /**
     * @var string
     */
    public static $description = "Disqus package for Laravel Admin by BFG";

    /**
     * @var string
     */
    protected $navigator = Navigator::class;

    /**
     * @var string
     */
    protected $install = Install::class;

    /**
     * @var string
     */
    protected $uninstall = Uninstall::class;

    /**
     * @var string
     */
    protected $permissions = Permissions::class;

    /**
     * @var ConfigExtensionProvider|string
     */
    protected $config = Config::class;

    /**
     * Bootstrap services.
     *
     * @return void
     * @throws Exception
     */
    public function boot()
    {
        parent::boot();

        $this->mergeConfigFrom(__DIR__ . '/../config/admin-disqus.php', 'admin-disqus');

        $this->publishes([
            __DIR__ . '/../config/admin-disqus.php' => config_path('admin-disqus.php')
        ], ['laravel-assets', 'admin-disqus-config']);
    }

    /**
     * Register services.
     *
     * @return void
     * @throws Exception
     */
    public function register()
    {
        parent::register();

        Controller::extend('disqus', DisqusComponent::class);
    }
}
