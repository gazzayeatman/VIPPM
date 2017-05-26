<?php

class HomePage extends Page {

	private static $db = [
        'Title'     => 'Varchar',
        'Content'   => 'HTMLText',
        'RightText' => 'HTMLText'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
         $fields->addFieldToTab(
            'Root.Main', 
            HTMLEditorField::create('RightText', 'Text that appears on the right','Metadata')
        );
		return $fields;
    }
}
class HomePage_Controller extends Page_Controller {

	public function init() {
		parent::init();
	}
}
