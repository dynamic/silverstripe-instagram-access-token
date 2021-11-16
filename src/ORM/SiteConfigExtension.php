<?php

namespace Dynamic\InstagramToken\ORM;

use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
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

    public function updateCMSFields(FieldList $fields)
    {
        $fields->addFieldsToTab('Root.Integrations', [
            TextField::create('InstagramAccessToken'),
        ]);
        parent::updateCMSFields($fields);
    }

}
