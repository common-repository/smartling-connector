<?php

namespace Smartling\Vendor\Smartling\Context\Params;
use Smartling\Vendor\Smartling\Parameters\BaseParameters;

/**
 * Class MissingResourcesParameters
 * @package Context\Params
 */
class MissingResourcesParameters extends BaseParameters
{

    public function setOffset($offset)
    {
        $this->params['offset'] = $offset;
    }

}
