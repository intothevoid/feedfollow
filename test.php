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
    $tokenfile = fopen("push_bullet_token", "r") or die("Unable to open token file!");
    $token = fread($tokenfile, filesize("push_bullet_token"));

    $pb = new PushBullet($token);
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
