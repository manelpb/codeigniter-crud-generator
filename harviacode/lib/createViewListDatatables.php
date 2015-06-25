<!--
Author : Hari Prasetyo
Website : harviacode.com
Create Date : 08/05/2015

You may edit this code, but please do not remove original information. Thanks :D
-->
<?php

$path = $target."views/" . $list_file;
        
$createList = fopen($path, "w") or die("Unable to open file!");

$result2 = mysql_query("SELECT COLUMN_NAME,COLUMN_KEY FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='$database' AND TABLE_NAME='$table' AND COLUMN_KEY = 'PRI'");
$row = mysql_fetch_assoc($result2);
$primary = $row['COLUMN_NAME'];

$string = "<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel=\"stylesheet\" href=\"<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>\"/>
        <link rel=\"stylesheet\" href=\"<?php echo base_url('assets/datatables/dataTables.bootstrap.css') ?>\"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <div class=\"row\" style=\"margin-bottom: 10px\">
            <div class=\"col-md-4\">
                <h2 style=\"margin-top:0px\">".ucfirst($table)." List</h2>
            </div>
            <div class=\"col-md-4 text-center\">
                <div style=\"margin-top: 4px\"  id=\"message\">
                    <?php echo \$this->session->userdata('message') <> '' ? \$this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class=\"col-md-4 text-right\">
                <?php echo anchor(site_url('".$controller."/create'), 'Create', 'class=\"btn btn-primary\"'); ?>";
if ($excel == 'create') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$controller."/excel'), 'Excel', 'class=\"btn btn-primary\"'); ?>";
}
if ($word == 'create') {
    $string .= "\n\t\t<?php echo anchor(site_url('".$controller."/word'), 'Word', 'class=\"btn btn-primary\"'); ?>";
}
$string .= "\n\t    </div>
        </div>
        <table class=\"table table-bordered table-striped\" id=\"mytable\">
            <thead>
                <tr>
                    <th>No</th>";

$result2 = mysql_query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='$database' AND TABLE_NAME='$table' AND COLUMN_KEY <> 'PRI'");
if (mysql_num_rows($result2) > 0)
{
    while ($row1 = mysql_fetch_assoc($result2))
    {
        $string .= "\n\t\t    <th>" . $row1['COLUMN_NAME'] . "</th>";
    }
}
$string .= "\n\t\t    <th>Action</th>
                </tr>
            </thead>";
$string .= "\n\t    <tbody>
            <?php
            \$start = 0;
            foreach ($" . $controller . "_data as \$$controller)
            {
                ?>
                <tr>";

$string .= "\n\t\t    <td><?php echo ++\$start ?></td>";

$result2 = mysql_query("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_SCHEMA='$database' AND TABLE_NAME='$table' AND COLUMN_KEY <> 'PRI'");
if (mysql_num_rows($result2) > 0)
{
    while ($row1 = mysql_fetch_assoc($result2))
    {
        $string .= "\n\t\t    <td><?php echo $" . $controller ."->". $row1['COLUMN_NAME'] . " ?></td>";
    }
}

$string .= "\n\t\t    <td style=\"text-align:center\">"
        . "\n\t\t\t<?php "
        . "\n\t\t\techo anchor(site_url('".$controller."/read/'.$".$controller."->".$primary."),'Read'); "
        . "\n\t\t\techo ' | '; "
        . "\n\t\t\techo anchor(site_url('".$controller."/update/'.$".$controller."->".$primary."),'Update'); "
        . "\n\t\t\techo ' | '; "
        . "\n\t\t\techo anchor(site_url('".$controller."/delete/'.$".$controller."->".$primary."),'Delete','onclick=\"javasciprt: return confirm(\\'Are You Sure ?\\')\"'); "
        . "\n\t\t\t?>"
        . "\n\t\t    </td>";

$string .=  "\n\t        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src=\"<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>\"></script>
        <script src=\"<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>\"></script>
        <script src=\"<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>\"></script>
        <script type=\"text/javascript\">
            $(document).ready(function () {
                $(\"#mytable\").dataTable();
            });
        </script>
    </body>
</html>";


fwrite($createList, $string);
fclose($createList);

$list_res = "<p>" . $path . "</p>";
?>