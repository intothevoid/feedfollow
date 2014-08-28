<html>
<body>

<form action="test.php" method="post">
Feed URL: <input type="text" name="feedurl"><br>
<input type="submit">
</form>

</body>
</html>

<?php

require 'php/autoloader.php';

#$url = 'http://news.google.com/news?ned&topic=h&output=rss';

$url = $_POST['feedurl'];

$feed = new SimplePie();
$feed->set_feed_url($url);
$feed->init();
$feed->handle_content_type();

echo '<h2>' . $feed->get_title() . '</h2>';
echo '<h3>' . $feed->get_description() . '</h3>';

foreach ($feed->get_items() as $item)
{
    echo '<p> <a href=' . $item->get_link() . '>' . $item->get_title() .
        '</a> <small>' . $item->get_date() . '</small> </p>';
}

echo 'Done.';
?>
