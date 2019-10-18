<?php

namespace App\Integration;

class EvantoMarketApi
{
    /**
     * @var string
     */
    private $baseUrl = 'https://api.envato.com/v';

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
     * @param array $params
     * @return \stdClass
     */
    public function getListPurchases(array $params = []): \stdClass
    {
        $location = 'market/buyer/list-purchases';

        return $this->makeRequest($location, $params, 3);
    }

    /**
     * @param int $page
     * @return array
     */
    public function getSales(int $page = 1): array
    {
        $location = 'market/author/sales';

        $params = [
            'page' => $page
        ];

        return $this->makeRequest($location, $params, 3);
    }

    /**
     * @param string $code
     * @return \stdClass
     */
    public function findPurchase(string $code): \stdClass
    {
        $location = 'market/buyer/purchase';

        $params = [
            'code' => $code,
        ];

        return $this->makeRequest($location, $params, 3);
    }

    /**
     * @param string $location
     * @param array $params
     * @param int $version
     * @return \stdClass|array
     */
    private function makeRequest(string $location, array $params = [], int $version = 1)
    {
        $headers = [
            'Authorization: Bearer ' . $this->token,
        ];

        $curl = curl_init($this->baseUrl . $version . '/' . $location . '?' . http_build_query($params));

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

        $content = curl_exec($curl);

        return empty($content) ? new \stdClass() : json_decode($content);
    }
}
