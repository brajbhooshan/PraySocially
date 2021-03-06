<?php
//Define base path of project
//for local

//define( "BASE_PATH", "".$_SERVER['DOCUMENT_ROOT']."/" );

//for server
//define( "BASE_PATH", "".$_SERVER['DOCUMENT_ROOT']."/" );


//Define base url of project
//for local
define('BASE_URL', 'http://localhost/PraySocially');
require('connection.php');
require('redirect.php');
require('users.php');


//for server
//define('BASE_URL', 'http://www.disposalmanager.com/geetu/');

//connection file

class Init {
    
    protected $redirect;
    protected $session;
    protected $dbh;
    private static $instance=NULL;
    
    function __construct() {
        $dbObject = DatabaseConnection::getInstance();
        $this->_dbh = $dbObject->getConnection();
        $this->_redirect = URLRedirect::getInstance();

    }
    
    //get object of current class...
    public static function getInstance() { 
        if( self::$instance === NULL ) { 
            self::$instance = new self();
        }
        return self::$instance;
    }
    
  
    //get redirect object
    public function getRedirect(){
        return $this->_redirect;
    }

}
$init = Init::getInstance();
