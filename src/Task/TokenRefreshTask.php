<?php

namespace Dynamic\InstagramToken\Task;

use Dynamic\InstagramToken\ORM\SiteConfigExtension;
use GuzzleHttp\Client;
use SilverStripe\Dev\BuildTask;
use SilverStripe\SiteConfig\SiteConfig;

class TokenRefreshTask extends BuildTask
{

    public function run($request)
    {
        /** @var SiteConfig|SiteConfigExtension $config */
        $config = SiteConfig::current_site_config();
        $config->InstagramAccessToken = $this->exchangeToken($config->InstagramAccessToken);
        $config->write();
    }

    /**
     * @param string $currentToken
     * @return string
     */
    protected function exchangeToken($currentToken)
    {
        $client = new Client([
            'base_uri' => 'https://graph.instagram.com/',
            'allow_redirects' => false,
        ]);

        $response = $client->get('refresh_access_token', [
            'query' => [
                'grant_type' => 'ig_refresh_token',
                'access_token' => $currentToken,
            ]
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Refresh token error threw a ' . $response->getStatusCode());
        }

        if ($response->getBody() && !empty($response->getBody())) {
            $response = json_decode($response->getBody(), true);
        }

        if (array_key_exists('access_token', $response)) {
            return $response['access_token'];
        }

        throw new \Exception('Refresh token not returned');
    }

}
