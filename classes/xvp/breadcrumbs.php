<?php defined('SYSPATH') or die('No direct script access.');

class Xvp_Breadcrumbs
{
    /**
     * Default view 
     * @var string
     */
    protected $view = 'breadcrumbs/default';
    
    /**
     * Singleton instance
     * @var Xvp_Breadcrumbs
     */
    protected static $instance;
    
    /**
     * Stack of breadcrumb items
     * @var array
     */
    protected $items = array();
    
    /**
     * Constructor
     * @return Xvp_Breadcrumbs
     */
    private function __construct() {}
    
    /**
     * Get the unique instance
     * @return Xvp_Breadcrumbs
     */
    public static function getInstance()
    {
        if(self::$instance === null) {
            self::$instance = new Xvp_Breadcrumbs;
        }
        return self::$instance;
    }
    
    /**
     * Set the template name
     * @param string $view 
     */
    public function setView($view)
    {
        $this->view = $view;
    }
    
    /**
     * Add a new item to the breadcrumb stack
     * @param string $label
     * @param string $url
     */
    public function addItem($label, $url = null)
    {
        $this->items[] = array(
            'label' => $label,
            'url'   => $url,
        );
    }
    
    /**
     * Render the breadcrumb
     * @return string
     */
    public function render()
    {
        $view = View::factory($this->view);
        $view->items = $this->items;
        return $view->render();
    }
}