<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Things Read</h2>
        <table class="table">
	    <tr><td>thg_title</td><td><?php echo $thg_title; ?></td></tr>
	    <tr><td>tgh_description</td><td><?php echo $tgh_description; ?></td></tr>
	    <tr><td>tgh_image</td><td><?php echo $tgh_image; ?></td></tr>
	    <tr><td>tgh_geo</td><td><?php echo $tgh_geo; ?></td></tr>
	    <tr><td>tgh_address</td><td><?php echo $tgh_address; ?></td></tr>
	    <tr><td>tgh_popularity</td><td><?php echo $tgh_popularity; ?></td></tr>
	    <tr><td>tgh_tty_id</td><td><?php echo $tgh_tty_id; ?></td></tr>
	    <tr><td>tgh_created_at</td><td><?php echo $tgh_created_at; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('things') ?>" class="btn btn-default">Cancel</button></td></tr>
	</table>
    </body>
</html>