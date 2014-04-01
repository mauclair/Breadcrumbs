<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Breadcrumbs core
 */
class Kohana_Breadcrumbs
{
    /**
     * @var string Template name
     */
    protected $_template = 'breadcrumbs';
    
    /**
     * Breadcrumbs instance
     * @var Breadcrumbs
     */
    protected static $_instance;
    
    /**
     * Stack of breadcrumb items
     * @var array
     */
    protected $_items = array();

    protected $_active;

    /**
     * Constructor
     * @return object Breadcrumbs
     */
    protected function __construct($_name)
    {
        $this->_name = $_name;
        $this->_config = Kohana::$config->load($_name);

        $this->_items = array();

        $this->_items[] = array(
            'title' => 'Home',
            'url'   => '/',
        );

        $this->_active = 0;
    }

    static public function instance($_name = 'breadcrumbs')
    {
        static $_instances;

        if ( ! isset($_instances[$_name]))
        {
            $_instances[$_name] = new Breadcrumbs($_name);
        }

        return $_instances[$_name];
    }

    public function add_item($title, $url, $active=FALSE)
    {
        $this->_items[] = array(
            'title' => $title,
            'url'   => $url,
        );

        $this->_active = count($this->_items) - 1;
    }
    
    /**
     * Render the breadcrumb
     * @return string
     */
    public function render()
    {
        $view = View::factory($this->_template)
            ->set('items', $this->_items)
            ->set('active', $this->_active);

        return $view->render();
    }
}