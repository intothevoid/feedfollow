<?php

require '../php/autoloader.php';

$url = 'http://news.google.com/news?ned&topic=h&output=rss';

$feed = new SimplePie();
$feed->set_feed_url($url);
$feed->init();

// default starting item
$start = 0;

// default number of items to display. 0 = all
$length = 0;

// if single item, set start to item number and length to 1
if (isset($_GET['item']))
{
    $start = $_GET('item');
    $length = 1;
}

// set item link to script url
$link = $_SERVER['REQUEST_URI'];

// loop through items

foreach ($feed->get_items($start, $length) as $key=>$item)
{
    // set query string to item number
    $queryString = '?item' . $key;

    // for displaying single item, set item link to iteself and set query
    // string to nothing
    if (isset($_GET['item']))
    {
        $link = $item->get_link();
        $queryString = '';
    }

    // display item title and date
    echo '<a href="' . $link . $queryString . '">' . $item->get_title() . '</a>';
    echo '<small>' . $item->get_date().'</small><br>';

    // if single item, display content
    if (isset($_GET['item']))
    {
        echo ' <small>'.$item->get_content().'</small><br>';
    }
    echo '<br>';
}

?>
