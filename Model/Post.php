<?php
namespace Model;


/**
 * Description of Post
 *
 * @author igor
 */
abstract class Post implements Renderable {

    /**
     * @var array
     */
    protected $_data = [];

    /**
     * @param array $data
     */
    public function __construct(array $data) {
        $this->_data = $data;
    }

    function render() {
        $output = "<h1>" . $this->_data['title'] . "</h1>" . "</br>";
        $output .= "<p>" . $this->_data['content'] . "</p>" . "</br>";
        if (isset($this->_data['author'])) {
            $output .= "<p> Author: " . $this->_data['author'] . "</p>" . "</br>";
        }
        $output .= '-----------------';

        return $output;
    }

}
