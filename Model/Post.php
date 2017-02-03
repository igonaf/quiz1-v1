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
        $output .= '-----------------';
        
        return $output;
    }

}
