<?php

namespace Smartling\Vendor\Smartling\TranslationRequests;
use Smartling\Vendor\Psr\Log\LoggerInterface;
use Smartling\Vendor\Smartling\AuthApi\AuthApiInterface;
use Smartling\Vendor\Smartling\BaseApiAbstract;
use Smartling\Vendor\Smartling\Exceptions\SmartlingApiException;
use Smartling\Vendor\Smartling\TranslationRequests\Params\CreateTranslationRequestParams;
use Smartling\Vendor\Smartling\TranslationRequests\Params\SearchTranslationRequestParams;
use Smartling\Vendor\Smartling\TranslationRequests\Params\UpdateTranslationRequestParams;

/**
 * Class TranslationRequestsApi
 * @package Smartling\Vendor\Smartling\TranslationRequests
 */
class TranslationRequestsApi extends BaseApiAbstract
{
    const ENDPOINT_URL = 'https://api.smartling.com/submission-service-api/v2/projects';

    /**
     * @param AuthApiInterface $authProvider
     * @param string $projectId
     * @param LoggerInterface $logger
     *
     * @return TranslationRequestsApi
     */
    public static function create(AuthApiInterface $authProvider, $projectId, $logger = null)
    {
        $client = static::initializeHttpClient(static::ENDPOINT_URL);

        $instance = new self($projectId, $client, $logger, static::ENDPOINT_URL);
        $instance->setAuth($authProvider);

        return $instance;
    }

    /**
     * @param string $bucketName
     * @param CreateTranslationRequestParams $params
     * @return mixed
     * @throws SmartlingApiException
     */
    public function createTranslationRequest($bucketName, CreateTranslationRequestParams $params)
    {
        $requestData = $this->getDefaultRequestData('json', $params->exportToArray());
        $requestUri = vsprintf('buckets/%s/translation-requests', [$bucketName]);
        return $this->sendRequest($requestUri, $requestData, static::HTTP_METHOD_POST);
    }


    /**
     * @param string $bucketName
     * @param string $translationRequestUid
     * @return array
     * @throws SmartlingApiException
     */
    public function getTranslationRequest($bucketName, $translationRequestUid)
    {
        $requestData = $this->getDefaultRequestData('query', []);
        $requestUri = vsprintf('buckets/%s/translation-requests/%s', [$bucketName, $translationRequestUid]);
        return $this->sendRequest($requestUri, $requestData, static::HTTP_METHOD_GET);
    }

    /**
     * @param string $bucketName
     * @param string $translationRequestUid
     * @param UpdateTranslationRequestParams $params
     * @return mixed
     * @throws SmartlingApiException
     */
    public function updateTranslationRequest($bucketName, $translationRequestUid, UpdateTranslationRequestParams $params)
    {
        $requestData = $this->getDefaultRequestData('json', $params->exportToArray());
        $requestUri = vsprintf('buckets/%s/translation-requests/%s', [$bucketName, $translationRequestUid]);
        return $this->sendRequest($requestUri, $requestData, static::HTTP_METHOD_PUT);
    }

    /**
     * @param string $bucketName
     * @param SearchTranslationRequestParams $searchParams
     * @return array
     * @throws SmartlingApiException
     */
    public function searchTranslationRequests($bucketName, SearchTranslationRequestParams $searchParams)
    {
        $requestData = $this->getDefaultRequestData('query', $searchParams->exportToArray());
        $requestUri = vsprintf('buckets/%s/translation-requests', [$bucketName]);
        return $this->sendRequest($requestUri, $requestData, static::HTTP_METHOD_GET);
    }
}
