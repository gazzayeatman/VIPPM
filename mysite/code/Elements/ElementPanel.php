<?php
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
    public static $has_one = [
        'Page' => 'Page'
    ];

    /**
     * Has many relationship
     * @var array
     */
    private static $has_many = [
        'Elements' => 'BaseElement'
    ];

    /**
     * Duplicate relations
     * @var array
     */
    private static $duplicate_relations = [
        'Elements'
    ];

    /**
     * Extensions
     * @var array
     */
    private static $extensions = [
        'ElementPublishChildren'
    ];

    /**
     * CMS Fields
     * @var array
     */
    public function getCMSFields()
    {
        $elements = $this->Elements();
        $isInDb = $this->isInDB();

        $this->beforeUpdateCMSFields(
            function ($fields) use ($elements, $isInDb) {
                $fields->removeByName('Root.Elements');
                $fields->removeByName('Elements');
                $fields->removeFieldFromTab('Root.Main', 'ListDescription');

                if ($isInDb) {
                    $adder = new ElementalGridFieldAddNewMultiClass();
                    $list = $this->getAvailableTypes();

                    if ($list) {
                        $adder->setClasses($list);
                    }

                    $config = GridFieldConfig_RecordEditor::create(100);
                    $config->addComponent(new GridFieldSortableRows('Sort'));
                    $config->removeComponentsByType('GridFieldAddNewButton');
                    $config->removeComponentsByType('GridFieldSortableHeader');
                    $config->removeComponentsByType('GridFieldDeleteAction');
                    $config->removeComponentsByType('GridFieldAddExistingAutocompleter');
                    $config->addComponent(new GridFieldTitleHeader());
                    $config->addComponent(new ElementalGridFieldDeleteAction());
                    $config->addComponent($adder);
                    $config->addComponent($autocompleter = new ElementalGridFieldAddExistingAutocompleter());

                    if ($list) {
                        $autocompleter->setSearchList(
                            BaseElement::get()->filter('ClassName', array_keys($list))
                        );
                    }

                    $widgetArea = new GridField(
                        'Elements',
                        Config::inst()->get("ElementPageExtension", 'elements_title'),
                        $elements,
                        $config
                    );

                    $fields->addFieldToTab('Root.Main', $widgetArea);
                }
            }
        );

        return parent::getCMSFields();
    }
    /**
     * Get available types
     * @return array
     */
    public function getAvailableTypes()
    {
        if (is_array($this->config()->get('allowed_elements'))) {
            $list = $this->config()->get('allowed_elements');

            if ($this->config()->get('sort_types_alphabetically') !== false) {
                $sorted = [];

                foreach ($list as $class) {
                    $inst = singleton($class);

                    if ($inst->canCreate()) {
                        $sorted[$class] = singleton($class)->i18n_singular_name();
                    }
                }

                $list = $sorted;
                asort($list);
            }
        } else {
            $classes = ClassInfo::subclassesFor('BaseElement');
            $list = [];
            unset($classes['BaseElement']);

            $disallowedElements = (array) $this->config()->get('disallowed_elements');

            if (!in_array('ElementVirtualLinked', $disallowedElements)) {
                array_push($disallowedElements, 'ElementVirtualLinked');
            }

            foreach ($classes as $class) {
                $inst = singleton($class);

                if (!in_array($class, $disallowedElements) && $inst->canCreate()) {
                    $list[$class] = singleton($class)->i18n_singular_name();
                }
            }

            asort($list);
        }

        if (method_exists($this, 'sortElementalOptions')) {
            $this->sortElementalOptions($list);
        }
        return $list;
    }

    /**
     * Used in template instead of {@link Widgets()} to wrap each widget in its
     * controller, making it easier to access and process form logic and
     * actions stored in {@link WidgetController}.
     *
     * @return SS_List - Collection of {@link WidgetController} instances.
     */
    public function WidgetControllers()
    {
        $controllers = new ArrayList();
        foreach ($this->Elements()->filter('Enabled', 1) as $widget) {
            $controller = $widget->getController();
            $controller->init();
            $controllers->push($controller);
        }
        return $controllers;
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
