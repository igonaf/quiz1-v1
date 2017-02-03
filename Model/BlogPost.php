<?php
namespace Model;
/**
 * Class BlogPost
 *
 * @author igor
 */
class BlogPost extends Post {

    /**
     * Overrides method from Post
     */
    function render() {
        $output = parent::render();
        $output .= "<p> Author: " . $this->_data['author'] . "</p>" . "</br>";
        echo '-----------------' . "</br>";
        
        return $output;
    }

}
