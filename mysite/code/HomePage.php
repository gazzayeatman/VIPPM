<?php

class HomePage extends Page {

	private static $db = [
        'Title'     => 'Varchar',
        'Content'   => 'HTMLText',
        'RightText' => 'HTMLText'
    ];

	private static $has_one = [
        'Logo' => 'Image'
    ];

    public function getCMSFields()
    {
        $fields = parent::getCMSFields();
         $fields->addFieldToTab(
            'Root.Main', 
            HTMLEditorField::create('RightText', 'Text that appears on the right','Metadata')
        );
        $fields->addFieldToTab(
            'Root.Main',    
            $uploadField = new UploadField(
                $name = 'Logo',
                $title = 'Upload a logo image'
            ),
            "Content"
        );
		return $fields;
    }
}
class HomePage_Controller extends Page_Controller {

	public function init() {
		parent::init();
	}
}
