<?php

namespace Smartling\Vendor\Smartling\Batch\Params;
use Smartling\Vendor\Smartling\Parameters\BaseParameters;

/**
 * Class ExecuteBatchParameters
 *
 * @package Smartling\Vendor\Smartling\Facade\Params
 */
class ExecuteBatchParameters extends BaseParameters
{

    /**
     * @param string $targetLocaleId
     * @param string $workflowUid
     *
     * @return $this
     */
    public function addLocaleWorkflowPair($targetLocaleId, $workflowUid) {

      if (!\array_key_exists('localeWorkflows', $this->params)) {
        $this->set('localeWorkflows', []);
      }

      $this->params['localeWorkflows'][] = [
        'targetLocaleId' => $targetLocaleId,
        'workflowUid' => $workflowUid,
      ];

      return $this;
    }

}
