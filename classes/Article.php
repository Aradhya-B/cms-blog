<? php

/**
 * Class to handle articles 
 */

 class Article
 {

    // Properties 

    /**
     * @var int The article ID from the database 
     */
    public $id = null;

    /**
     * @var int When the article was published 
     */
    public $publicationDate = null;

    /**
     * @var string Full title of the article
     */
    public $title = null;

    /**
     * @var string A short summary of the article 
     */
    public $summary = null;

    /**
     * @var string The HTML content of the article 
     */
    public $content = null;
 }
?>