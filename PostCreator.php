<?php

use Exceptions\ClassNotFoundException;
use Exceptions\InvalidPostKeyException;

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
        if (!class_exists($post_type)) {
            throw new ClassNotFoundException('I did not find the class ' . $post_type);
        }

        foreach ($this->_conf as $key => $value) {
            if ($key == $post_type) {
                return new $key($data);
            }
        }

        throw new InvalidPostKeyException('The key(s) for class in config was(were) incorrect');
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
