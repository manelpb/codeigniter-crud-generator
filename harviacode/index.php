<!--
Author : Hari Prasetyo
Website : harviacode.com
Create Date : 08/05/2015

You may edit this code, but please do not remove original information. Thanks :D
-->
<?php
$table_error = '';
$model_res = '';
$controller_res = '';
$list_res = '';
$read_res = '';
$form_res = '';
$page_res = '';

if (isset($_POST['table'])) {
    // include connection 
    require 'lib/config.php';

    $connection = mysql_connect($hostname, $username, $password);
    $select_database = mysql_select_db($database);

    if (!$select_database) {
        die('Pleace check connection.php');
    }

    // get table name
    $table = strtolower(trim($_POST['table']));
    $versici = $_POST['versici'];
    $paginationConfig = isset($_POST['paginationConfig']) ? $_POST['paginationConfig'] : '';

    // cek table in database
    if (mysql_num_rows(mysql_query("SHOW TABLES LIKE '" . $table . "'")) <> 1) {
        // show error
        $table_error = "<p>Table \"" . $table . "\" does not exist</p>";
    } else {
        // setting 
        $model = $table . "_model";
        $controller = $table;
        $list = $table . "_list";
        $read = $table . "_read";
        $form = $table . "_form";

        //filename
        if ($versici == 2) {
            $model_file = $model . ".php";
            $controller_file = $controller . ".php";
        } else {
            $model_file = ucfirst($model) . ".php";
            $controller_file = ucfirst($controller) . ".php";
        }
        $list_file = $list . ".php";
        $read_file = $read . ".php";
        $form_file = $form . ".php";

        require 'lib/createModel.php';
        require 'lib/createController.php';
        require 'lib/createViewList.php';
        require 'lib/createViewForm.php';
        require 'lib/createViewRead.php';

        if ($paginationConfig == 'create') {
            require 'lib/createConfigPagination.php';
        }
    }
}
?>
<!doctype html>
<html>
    <head>
        <title>Codeigniter CRUD Generator</title>
        <link rel="stylesheet" href="lib/bootstrap.min.css"/>
        <style>
            body{
                padding: 15px;
            }
            p{
                margin-bottom: 5px;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <div class="row" style="margin-top: 10px">
            <div class="col-md-3">
                <form action="index.php" method="post">
                    <div class="form-group">
                        <input type="text" name="table" value="<?php echo isset($_POST['table']) ? $_POST['table'] : '' ?>" class="form-control" placeholder="Input Table Name" />
                    </div>
                    <?php $def_versi = isset($_POST['versici']) ? $_POST['versici'] : '2'; ?>
                    <div class="radio">
                        <label>
                            <input type="radio" name="versici" id="2" value="2" <?php echo $def_versi == '2' ? 'checked' : ''; ?>>
                            Codeigniter 2
                        </label>
                    </div>
                    <div class="radio">
                        <label>
                            <input type="radio" name="versici" id="3" value="3" <?php echo $def_versi == '3' ? 'checked' : ''; ?>>
                            Codeigniter 3
                        </label>
                    </div>
                    <div class="checkbox">
                        <?php $def_page = isset($_POST['paginationConfig']) ? $_POST['paginationConfig'] : ''; ?>
                        <label>
                            <input type="checkbox" name="paginationConfig" value="create" <?php echo $def_page == 'create' ? 'checked' : '' ?>>
                            Create ../application/config/pagination.php
                        </label>
                    </div>
                    <input type="submit" value="Generate" name="generate" class="btn btn-primary" onclick="javascript: return confirm('This will overwrite the existing files. Continue ?')" />
                </form>
                <?php
                echo $table_error;
                echo $model_res;
                echo $controller_res;
                echo $list_res;
                echo $read_res;
                echo $form_res;
                echo $page_res;
                ?>
            </div>
            <div class="col-md-9">
                <h3 style="margin-top: 0px">Codeigniter CRUD Generator 1.0 by <a target="_blank" href="http://harviacode.com">harviacode.com</a></h3>
                <p><strong>About :</strong></p>
                <p>
                    Codeigniter CRUD Generator is a simple tool to auto generate model, controller and view from your table. This tool will boost your
                    writing code. This CRUD generator will make a complete CRUD operation, pagination, search, form* and form validation. 
                    This CRUD Generator using bootstrap 3 style. You still need to modify the result code for more customization.
                </p>
                <small>* generate textarea and text input only</small>
                <p>
                    Please visit and like <a target="_blank" href="http://harviacode.com"><b>harviacode.com</b></a> for more info and PHP tutorials.
                </p>
                <p><strong>How to use this CRUD Generator :</strong></p>
                <ul>
                    <li>Simply put 'harviacode' folder, 'asset' folder and .htaccess file into your codeigniter root folder.</li>
                    <li>Change database configuration in harviacode/lib/config.php.</li>
                    <li>Open http://localhost/codeigniter/harviacode.</li>
                    <li>Write your table name, choose codeigniter version and push generate button.</li>
                    <li>That steps will generate this following files :
                        <ul>
                            <li>../application/models/tablename_model.php</li>
                            <li>../application/controllers/tablename.php</li>
                            <li>../application/views/tablename_list.php</li>
                            <li>../application/views/tablename_form.php</li>
                            <li>../application/views/tablename_read.php</li>
                            <li>../application/config/pagination.php</li>
                        </ul>
                    </li>
                </ul>
                <p><strong>Important :</strong></p>
                <ul>
                    <li>On application/config/autoload.php, load <b>database library</b>, <b>session library</b> and <b>url helper</b>.</li>
                    <li>On application/config/config.php, set <b>$config['index_page'] = ''</b>, <b>$config['url_suffix'] = '.html'</b> and <b>$config['encryption_key'] = 'randomstring'</b>.</li>
                    <li>On application/config/database.php, set <b>hostname</b>, <b>username</b>, <b>password</b> and <b>database</b>.</li>
                </ul>
                <p><strong>&COPY; 2015 <a target="_blank" href="http://harviacode.com">harviacode.com</a></strong></p>
            </div>
        </div>
    </body>
</html>


