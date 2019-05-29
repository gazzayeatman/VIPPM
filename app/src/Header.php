<?php

use SilverStripe\Assets\Image;
use SilverStripe\ORM\DataObject;
use SilverStripe\AssetAdmin\Forms\UploadField;

class Header extends DataObject {

    private static $db = [
        'Title' => 'Varchar'
    ];

    private static $has_one = [
        'Logo' => Image::class
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        $fields->addFieldToTab(
            'Root.Main',    
            $uploadField = new UploadField(
                $name = 'Logo',
                $title = 'Upload a logo image'
            )
        );
		return $fields;
    }

}
