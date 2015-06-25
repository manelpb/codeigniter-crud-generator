<!--
Author : Hari Prasetyo
Website : harviacode.com
Create Date : 08/05/2015

You may edit this code, but please do not remove original information. Thanks :D
-->
<?php

$path = $target."helpers/exportexcel_helper.php";
        
$createList = fopen($path, "w") or die("Unable to open file!");

$string = "<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//ekspor xls
function xlsBOF() {
echo pack(\"ssssss\", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
return;
}
 
function xlsEOF() {
echo pack(\"ss\", 0x0A, 0x00);
return;
}
 
function xlsWriteNumber(\$Row, \$Col, \$Value) {
echo pack(\"sssss\", 0x203, 14, \$Row, \$Col, 0x0);
echo pack(\"d\", \$Value);
return;
}
 
function xlsWriteLabel(\$Row, \$Col, \$Value ) {
\$L = strlen(\$Value);
echo pack(\"ssssss\", 0x204, 8 + \$L, \$Row, \$Col, 0x0, \$L);
echo \$Value;
return;
}


/* End of file exportexcel_helper.php */
/* Location: ./application/helpers/exportexcel_helper.php */
";


fwrite($createList, $string);
fclose($createList);

$excel_res = "<p>" . $path . "</p>";
?>