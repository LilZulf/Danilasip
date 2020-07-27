<?php

// header('Content-type: application/docx');

// foreach ($datafix as $arsip){

// print($arsip['FILE']);

// // $myfile = fopen($arsip['FILE'], "r") or die("Unable to open file!");
// // echo fread($myfile,filesize($arsip['FILE']));
// // fclose($myfile);

// }
?>
<html>
<body>
    <div>
        <?php
            foreach($datafix as $data) : 
        ?>
        <embed src="<?= base_url('arsip/'.$data['NAMA_ARSIP'])?>#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="100%" />
        <!-- <object data="<?= base_url()?>" type="application/pdf">
            <embed src="<?= base_url('arsip/Modul_6_Trigger.pdf')?>" type="application/pdf" />
        </object> -->
        <?php endforeach ;?>
    </div>
</body>
</html>