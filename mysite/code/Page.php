<?php

class Page extends SiteTree {

	private static $db = array(
	);

	private static $has_one = array(
	);

}

class Page_Controller extends ContentController {

	private static $allowed_actions = array (
	);

	public function init() {
		parent::init();
		Requirements::css($this->ThemeDir()."/bootstrap/css/bootstrap.min.css");
		Requirements::css($this->ThemeDir()."/css/style.css");
		Requirements::javascript($this->ThemeDir()."javascript/custom.js");
	}

}
