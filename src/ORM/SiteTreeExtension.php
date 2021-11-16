<?php

namespace Dynamic\InstagramToken\ORM;

use SilverStripe\Core\Extension;
use SilverStripe\SiteConfig\SiteConfig;

/**
 *
 */
class SiteTreeExtension extends Extension
{

    /**
     * @return string
     */
    public function getIgFeedToken()
    {
        return SiteConfig::current_site_config()->InstagramAccessToken;
    }
}
