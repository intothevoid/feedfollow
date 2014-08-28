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
require 'php/PushBullet.class.php';

#$url = 'http://news.google.com/news?ned&topic=h&output=rss';

$url = $_POST['feedurl'];

$feed = new SimplePie();
$feed->set_feed_url($url);
$feed->init();
$feed->handle_content_type();

echo '<h2>' . $feed->get_title() . '</h2>';

foreach ($feed->get_items() as $item)
{
    echo '<article>';
    echo '<p> <header> <a href=' . $item->get_link() . '>' . $item->get_title() .
        '</a> </header> <small>' . $item->get_date() . '</small> </p>';

    echo '</article>';
}


try
{
    $pb = new PushBullet('gqT3VNAcgiEFIE8mfY2qdOcqfDmTBpv9');

    print_r($pb->getUserInformation());

    print_r($pb->getDevices());

    $pb->pushNotepushNote('karankadam@gmail.com', 'Hey!', 'It works!');

    echo 'Pushed!';
}

catch (PushBulletException $e)
{
    // Handle exception
    die($e->getMessage());
}
?>
