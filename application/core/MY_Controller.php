<?php
/**
 * core/MY_Controller.php
 *
 * Default application controller
 */
class Application extends CI_Controller {
    protected $data = array();      // parameters for view components
    protected $id;		  // identifier for our content
    protected $choices = array(// our menu navbar
	'Home' => '/', 'Gallery' => '/gallery', 'About' => '/about'
    );
    /**
     * Constructor.
     * Establish view parameters & load common helpers
     */
    function __construct()
    {
	parent::__construct();
	$this->data = array();
	$this->data['pagetitle'] = 'Sample Image Gallery';
    }
    /**
     * Render this page
     */
    function render()
    {
     // Not in the instruction but seems to work. Without this line there will be an error:
     // A PHP Error was encountered
     //
     // Severity: Notice
     //
     // Message: Undefined property: About::$parser
     //
     // Filename: core/MY_Controller.php
    $this->load->library('parser');

    $this->data['menubar'] = build_menu_bar($this->choices);
	$this->data['content'] = $this->parser->parse($this->data['pagebody'], $this->data, true);
	$this->data['data'] = &$this->data;
	$this->parser->parse('template', $this->data);
    }

}
/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */
