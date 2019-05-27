<?php

use SilverStripe\ORM\DataObject;

class Footer extends DataObject {

    private static $db = [
        'Title'          => 'Varchar',
        'Map'            => 'HTMLText',
        'ContactDetails' => 'HTMLText'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
		return $fields;
    }
}
