<?php

use Model\Renderable;

/**
 * Description of Post
 *
 * @author igor
 */
abstract class Post implements Renderable {

    /**
     * @var string
     */
    private $_title;

    /**
     * @var string
     */
    private $_content;

    /**
     * Sort input content
     *
     * @param array $data
     */
    public function __construct(array $data) {
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'title':
                    $this->_title = $value;
                    break;
                case 'content':
                    $this->_content = $value;
                    break;
                default:
                    break;
            }
        }
    }

    function render() {
        echo "<h1>" . $this->_title . "</h1>" . "</br>";
        echo "<p>" . $this->_content . "</p>" . "</br>";
        echo '-----------------' . "</br>";
    }

}
