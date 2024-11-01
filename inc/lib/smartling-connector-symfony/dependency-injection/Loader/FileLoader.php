<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Smartling\Vendor\Symfony\Component\DependencyInjection\Loader;
use Smartling\Vendor\Symfony\Component\Config\FileLocatorInterface;
use Smartling\Vendor\Symfony\Component\Config\Loader\FileLoader as BaseFileLoader;
use Smartling\Vendor\Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * FileLoader is the abstract class used by all built-in loaders that are file based.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
abstract class FileLoader extends BaseFileLoader
{
    protected $container;

    public function __construct(ContainerBuilder $container, FileLocatorInterface $locator)
    {
        $this->container = $container;

        parent::__construct($locator);
    }
}
