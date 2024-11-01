<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Smartling\Vendor\Symfony\Component\Config\Tests\Fixtures\Builder;
use Smartling\Vendor\Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Smartling\Vendor\Symfony\Component\Config\Tests\Fixtures\BarNode;

class BarNodeDefinition extends NodeDefinition
{
    protected function createNode()
    {
        return new BarNode($this->name);
    }
}
