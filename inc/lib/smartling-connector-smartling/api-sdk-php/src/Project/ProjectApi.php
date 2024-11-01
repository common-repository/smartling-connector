<?php

namespace Smartling\Vendor\Smartling\Project;
use Smartling\Vendor\Psr\Log\LoggerInterface;
use Smartling\Vendor\Smartling\AuthApi\AuthApiInterface;
use Smartling\Vendor\Smartling\BaseApiAbstract;
use Smartling\Vendor\Smartling\Exceptions\SmartlingApiException;

/**
 * Class ProjectApi
 *
 * @package Smartling\Vendor\Smartling\Project
 */
class ProjectApi extends BaseApiAbstract
{
    const ENDPOINT_URL = 'https://api.smartling.com/projects-api/v2/projects';

    /**
     * @param AuthApiInterface $authProvider
     * @param string $projectId
     * @param LoggerInterface $logger
     *
     * @return ProjectApi
     */
    public static function create(AuthApiInterface $authProvider, $projectId, $logger = null)
    {

        $client = self::initializeHttpClient(self::ENDPOINT_URL);

        $instance = new self($projectId, $client, $logger, self::ENDPOINT_URL);
        $instance->setAuth($authProvider);

        return $instance;
    }

    /**
     * @return array
     * @throws SmartlingApiException
     */
    public function getProjectDetails()
    {
        $requestData = $this->getDefaultRequestData('query', []);

        return $this->sendRequest('', $requestData, self::HTTP_METHOD_GET);
    }
}
