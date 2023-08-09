<?php

namespace AdminDisqus\Extension;

use Admin\Core\InstallExtensionProvider;
use Admin\Interfaces\ActionWorkExtensionInterface;
use Illuminate\Support\Facades\Artisan;

class Install extends InstallExtensionProvider implements ActionWorkExtensionInterface {

    /**
     * @return void
     */
    public function handle(): void
    {
        Artisan::call('vendor:publish', [
            '--tag' => 'admin-disqus-config'
        ]);
    }
}
