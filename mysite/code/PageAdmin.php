<?php

class PageAdmin extends ModelAdmin {

    private static $managed_models = [
        'Header',
        'Footer'
    ];

    private static $url_segment = 'page-admin';

    private static $menu_title = 'Page Admin';
}