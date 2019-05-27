<?php

use SilverStripe\ORM\DataObject;
use SilverStripe\View\Requirements;
use SilverStripe\CMS\Controllers\ContentController;

class PageController extends ContentController
{

    public function init()
    {
        parent::init();
        Requirements::css($this->ThemeDir()."/bootstrap/css/bootstrap.min.css");
        Requirements::css($this->ThemeDir()."/font-awesome-4.7.0/css/font-awesome.min.css");
        Requirements::css($this->ThemeDir()."/css/style.css");
        Requirements::css($this->ThemeDir()."/css/form.css");
    }

    public function Header()
    {
        return DataObject::get_one("Header");
    }

    public function Footer()
    {
        return DataObject::get_one("Footer");
    }
}