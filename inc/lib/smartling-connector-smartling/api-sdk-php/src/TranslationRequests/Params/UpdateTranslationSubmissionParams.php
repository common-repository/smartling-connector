<?php

namespace Smartling\Vendor\Smartling\TranslationRequests\Params;

/**
 * Class UpdateTranslationSubmissionParams
 * @package Smartling\Vendor\Smartling\TranslationRequests\Params
 */
class UpdateTranslationSubmissionParams extends TranslationSubmissionParamsAbstract
{
    /**
     * @param string $translationSubmissionUid
     * @return $this
     */
    public function setTranslationSubmissionUid($translationSubmissionUid)
    {
        $this->set('translationSubmissionUid', (string)$translationSubmissionUid);
        return $this;
    }
}
