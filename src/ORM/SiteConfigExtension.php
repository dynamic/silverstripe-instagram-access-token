<?php

namespace Dynamic\InstagramToken\ORM;

use SilverStripe\ORM\DataExtension;
use SilverStripe\SiteConfig\SiteConfig;

/**
 * @property string InstagramAccessToken
 *
 * @property-read SiteConfig|SiteConfigExtension $owner
 */
class SiteConfigExtension extends DataExtension
{
    /**
     * @var string[]
     */
    private static $db = [
        'InstagramAccessToken' => 'Varchar',
    ];


}
