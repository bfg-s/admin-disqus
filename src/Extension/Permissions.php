<?php

namespace AdminDisqus\Extension;

use Admin\Core\PermissionsExtensionProvider;

/**
 * Class Permissions
 * @package Lar\LteAdmin\Extend\Settings\Extension
 */
class Permissions extends PermissionsExtensionProvider {

    /**
     * Has function permission in extension
     *
     * @return array
     */
    public function functions(): array
    {
        return [];
    }
}
