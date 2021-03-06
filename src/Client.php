<?php

namespace Silverstreet;

use Laravie\Codex\Client as BaseClient;
use Http\Client\Common\HttpMethodsClient as HttpClient;

class Client extends BaseClient
{
    /**
     * The API endpoint.
     *
     * @var string
     */
    protected $apiEndpoint = 'https://api.silverstreet.com';

    /**
     * The API username.
     *
     * @var string
     */
    protected $apiUsername;

    /**
     * The API password.
     *
     * @var string
     */
    protected $apiPassword;

    /**
     * List of supported API versions.
     *
     * @var array
     */
    protected $supportedVersions = [
        'v1' => 'One',
    ];

    /**
     * Construct a new Billplz Client.
     *
     * @param \Http\Client\Common\HttpMethodsClient  $http
     * @param string  $apiUsername
     * @param string  $apiPassword
     */
    public function __construct(HttpClient $http, $apiUsername, $apiPassword)
    {
        $this->http = $http;
        $this->apiUsername = $apiUsername;
        $this->apiPassword = $apiPassword;
    }

    /**
     * Make a client.
     *
     * @param string  $apiUsername
     * @param string  $apiPassword
     *
     * @return $this
     */
    public static function make($apiUsername, $apiPassword)
    {
        return new static(static::makeHttpClient(), $apiUsername, $apiPassword);
    }

    /**
     * Get API username.
     *
     * @return string|null
     */
    public function getApiUsername()
    {
        return $this->apiUsername;
    }

    /**
     * Get API Password.
     *
     * @return string|null
     */
    public function getApiPassword()
    {
        return $this->apiPassword;
    }

    /**
     * Resolve the sanitizer class.
     *
     * @return \Laravie\Codex\Sanitizer|null
     */
    protected function sanitizeWith()
    {
        return;
    }

    /**
     * Get resource default namespace.
     *
     * @return string
     */
    protected function getResourceNamespace()
    {
        return __NAMESPACE__;
    }
}
