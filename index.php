<?php
require_once '../php/autoloader.php';

$feed = new SimplePie();

// Set URL
$feed->set_feed_url('http://www.ozbargain.com.au');

// Process
$feed->init();

// Send HTML to browser page
$feed->handle_content_type();
?>

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN">
<html>

    <head>
        <title>Sample test feed - Powered by Simple Pie</title>
        <style type="text/css">
            body {
                font:12px/1.4em Verdana, sans-serif;
                color:#333;
                background-color: #fff;
                width: 700px;
                margin: 50px auto;
                padding: 0;
            }
            
            a {
		color:#326EA1;
		text-decoration:underline;
		padding:0 1px;
            }
 
            a:hover {
		background-color:#333;
		color:#fff;
		text-decoration:none;
            }
 
            div.header {
		border-bottom:1px solid #999;
            }
 
            div.item {
		padding:5px 0;
		border-bottom:1px solid #999;
            }
        </style>
    </head>
    
    <body>
        <div class="header">
            <h1><a href="<?php echo $feed->get_permalink(); ?>"><?php echo $feed->get_title();?>"</a></h1>
            <p><?php echo $feed->get_description?></p>
        </div>
        
        <?php
        // Loop through all the items in the feed
        foreach ($feed->get_items() as $item):
        ?>
        
        <div class="item">
            <h2><a href="<?php echo $item->getpermalink(); ?>"><?php echo $item->get_title();?></a></h2>
            <p>echo $item->get_description();</p>
            <p><small>Posted on <?php echo $item->get_date('j F Y | g:i a');?></small></p>
        </div>
        
        <?php endforeach; ?>
    </body>
</html>