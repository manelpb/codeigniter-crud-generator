<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <link rel="stylesheet" href="<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <h2 style="margin-top:0px">Things List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('things/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
		    <th>thg_title</th>
		    <th>tgh_description</th>
		    <th>tgh_image</th>
		    <th>tgh_geo</th>
		    <th>tgh_address</th>
		    <th>tgh_popularity</th>
		    <th>tgh_tty_id</th>
		    <th>tgh_created_at</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($things_data as $things)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $things->thg_title ?></td>
		    <td><?php echo $things->tgh_description ?></td>
		    <td><?php echo $things->tgh_image ?></td>
		    <td><?php echo $things->tgh_geo ?></td>
		    <td><?php echo $things->tgh_address ?></td>
		    <td><?php echo $things->tgh_popularity ?></td>
		    <td><?php echo $things->tgh_tty_id ?></td>
		    <td><?php echo $things->tgh_created_at ?></td>
		    <td style="text-align:center">
			<?php 
			echo anchor(site_url('things/read/'.$things->thg_id),'Read'); 
			echo ' | '; 
			echo anchor(site_url('things/update/'.$things->thg_id),'Update'); 
			echo ' | '; 
			echo anchor(site_url('things/delete/'.$things->thg_id),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
    </body>
</html>