<?php

namespace App\Integration;

class EvantoMarketApi
{
    /**
     * @var string
     */
    private $baseUrl = 'https://api.envato.com/v1/';

    /**
     * @var string
     */
    private $token;

    /**
     * EvantoMarketApi constructor.
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    /**
     * @param string $name
     * @return \stdClass
     */
    public function getUserInformationByName(string $name): \stdClass
    {
        $location = "market/user:$name.json";

        return $this->makeRequest($location);
    }

    /**
     * @param string $site
     * @return \stdClass
     */
    public function getItemsBySite(string $site): \stdClass
    {
        $location = "market/user-items-by-site:$site.json";

        return $this->makeRequest($location);
    }

    /**
     * @param string $location
     * @param array $params
     * @return \stdClass
     */
    private function makeRequest(string $location, array $params = []): \stdClass
    {
        $headers = [
            'Authorization: Bearer ' . $this->token,
        ];

        $curl = curl_init($this->baseUrl . $location);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $content = curl_exec($curl);

        return json_decode($content);
    }
}
