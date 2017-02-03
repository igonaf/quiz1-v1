<?php

use Exceptions\ClassNotFoundException;
use Exceptions\InvalidPostKeyException;
use Model\BlogPost;
use Model\NewsPost;

/**
 * class PostCreator
 *
 * @author igor
 */
class PostCreator {

    /**
     * @var object  Instance of current class
     */
    public static $_instance;

    /**
     * @var array   Config mapping
     */
    private $_conf;

    const CONFIG_FILE = 'config.php';

    /**
     * Get single instance of current class
     */
    public static function getInstance() {
        if (NULL === self::$_instance) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * Factory make instance of classes from config
     *
     * @param string $post_type 
     * @param array $data 
     */
    public function make(string $post_type, array $data) {
        if (!isset($this->_conf[$post_type])) {
            throw new InvalidPostKeyException('The key for class in config was incorrect');
        }

        if (class_exists($this->_conf[$post_type])) {
            return new $this->_conf[$post_type]($data);
        } else {
            throw new ClassNotFoundException('I did not find the class ' . $this->_conf[$post_type]);
        }
    }

    /**
     * PostCreator constructor
     * Get data from config
     */
    private function __construct() {
        $this->_conf = require_once self::CONFIG_FILE;
    }

    /**
     * Forbidden magic method for use according to the singleton pattern
     */
    private function __clone() {
        
    }

}
