<?php

/**
 * Class BlogPost
 *
 * @author igor
 */
class BlogPost extends Post {

    /**
     * @var string
     */
    private $_author;

    /**
     * Sort input content
     *
     * @param array $data
     */
    public function __construct(array $data) {
        parent::__construct($data);
        foreach ($data as $key => $value) {
            switch ($key) {
                case 'author':
                    $this->_author = $value;
                    break;

                default:
                    break;
            }
        }
    }

    /**
     * Overrides method from Post
     */
    function render() {
        parent::render();
        echo "<p>Author: " . $this->_author . "</p>" . "</br>";
        echo '-----------------' . "</br>";
    }

}
