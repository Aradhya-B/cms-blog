<?php

require("config.php");
// $_GET is an associative array of variables passed to the current script via URL parameters (query strings)
$action = isset( $_GET['action'] ) ? $_GET['action'] : "";

// Ex. http://example.com/?action=archive
switch ( $action ) {
    case 'archive':
        archive();
        break;
    case 'viewArticle':
        viewArticle();
        break; 
    default:
        homepage();
}

function archive() {
    $results = array();
    $data = Article::getList();
    $results['articles'] = $data['results'];
    $results['totalRows'] = $data['totalRows'];
    $results['pageTitle'] = "Article Archive | The Uneducated Narcissist";
    require( TEMPLATE_PATH . "/archive.php" );
}

function viewArticle() {
    if (!isset($_GET["articleId"]) || !$_GET["articleId"] ) {
        homepage();
        return;
    }

    $results = array();
    $results['article'] = Article::getById( (int)$_GET["articleId"] );
    $results['pageTitle'] = $results['article']->title . "The Uneducated Narcissist";
    require( TEMPLATE_PATH . "/viewArticle.php");
}

function homepage() {
    $results = array();
    $data = Article::getList( HOMEPAGE_NUM_ARTICLES );
    $results['articles'] = $data['articles'];
    $results['totalRows'] = $data['totalRows'];
    $results['pageTitle'] = "The Uneducated Narcissist";
    require( TEMPLATE_PATH . "/homepage.php" );
}

?>