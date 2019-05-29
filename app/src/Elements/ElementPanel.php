<?php

use DNADesign\Elemental\Models\BaseElement;
use DNADesign\ElementalList\Model\ElementList;
/** 
 *  Element: Main Panel
 *
 *  The main panel container, this holds the Element Body Text elements.
 *  
 * @package    Elemental
 * @subpackage VIPPM
 * @author     Garry Yeatman <Garry@Yeatman.co.nz>
 */
class ElementPanel extends ElementList 
{
    /**
     * Element Title
     * @var string
     */
    private static $title = 'Panel';

    private static $db = [
        'PanelContent' => 'HTMLText'
    ];

    /**
     * Element Description
     * @var String
     */
    private static $description = 'This panel houses elements on your home page';
    
    /**
     * Has one relationship
     * @var array
     */
    private static $has_one = [
        'Page' => Page::class
    ];

    /**
     * Has many relationship
     * @var array
     */
    private static $has_many = [
        'Elements' => BaseElement::class
    ];

    /**
     * CMS Fields
     * @var array
     */
    public function getCMSFields()
    {
        return parent::getCMSFields();
    }

    /** 
     * Get bootstrap grid size
     * @param string
     */
    public function SetColSize($numberOfWidgets)
    {
        if ($numberOfWidgets == 0) {
            $result = 12;
        } else {
            $result = (12 / $numberOfWidgets);
        }
        return ('col-sm-' . $result);
    }
    
}
