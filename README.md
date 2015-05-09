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