   
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar Client</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="150%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Client Name</th>
                                            <th>Target IP</th>
                                            <th>Upload Limit / Download Limit</th>
                                            <th>Upload</th>
                                            <th>Download</th>
                                            <th>Usage Data Upload / Download</th>
                                        </tr>
                                    </thead>
                                    <?php

                                    require('../routeros_api.class.php');

                                    $API = new RouterosAPI();

                                    $API->debug = false;

                                    if ($API->connect('192.168.13.1', 'admin', '')) {

                                       $results = $API->comm("/queue/simple/print");

                                       foreach ($results as $data) {
                                            $clientName =  $data['name'];
                                            $clientIP = $data['target'];
                                            $clientMaxDown = $data['limit-at'];
                                            $clientMaxUp = $data['max-limit'];
                                            $clientDownloads = $data['bytes'];
                                            $rate = $data['rate'];

                        
                                            // konversi rate 
                                            $string = $rate;
                                            // explode a string by /
                                            $array = explode("/", $string);
                                            $rateupload1 = ($array[0]);
                                            $ratedownload1 = ($array[1]);



                                            $rateupload = formatBytes2($array[0],2);
                                            $ratedownload = formatBytes2($array[1],2);

                                            // konversi Data 
                                            $string2 = $clientDownloads;
                                            // explode a string by /
                                            $array2 = explode("/", $string2);


                                            $dataupload = formatBytes2($array2[0],2);
                                            $datadownload = formatBytes2($array2[1],2);

                                            // konversi Limit Upload Download
                                            $string3 = $clientMaxUp;
                                            // explode a string by /
                                            $array3 = explode("/", $string3);
                                            $limitupload1 = ($array3[0]);
                                            $limitdownload1= ($array3[1]);

                                            $limitupload = formatBytes2($array3[0],2);
                                            $limitdownload = formatBytes2($array3[1],2);


                                    //Notif Kolom Merah Jika Rate >= Limit
                                    if ($ratedownload1 >= $limitdownload1) {
                                        $color = "style='background-color: red;'";
                                    }
                                    else if ($rateupload1 >= $limitupload1)
                                    {
                                        $color = "style='background-color: red;'";
                                    }
                                    else
                                    {
                                        $color = "style='background-color: white;'";
                                    }

                                    
                                    ?>

                                    <tbody>
                                        <tr <?= $color?>>
                                            <?php //echo $data['.id'];?>
                                            <?php $id = str_replace('*', '', $data['.id']) ?>
                                            <th><?php echo $clientName;
                                             ?></th>
                                            <th><?php echo $clientIP;
                                             ?></th>
                                            <th><?php echo $limitupload, ' / ', $limitdownload;
                                             ?></th>
                                             <th ><?php echo $rateupload;
                                             ?></th>
                                             <th ><?php echo $ratedownload;
                                             ?></th>
                                             <th><?php echo $dataupload, ' / ', $datadownload;
                                             ?></th>      
                                             <!-- <th><form action="delete_queue.php" method="post">
                                                 <button type="submit" class="btn btn-danger" name="delete" id="delete" >Delete</button>
                                             </form></th> -->
                                        </tr>
                                    </tbody>
                                    

                                    <?php 

                                        }
                                    }


                                    if (isset($_POST['delete'])) {

                                    $API = new RouterosAPI();
                                    // Aktifkan debug
                                    $API->debug = false;


                                    if ($API->connect('192.168.13.1', 'admin', ''))
                                    {       
                                                           
                                        $API->write('/queue/simple/remove', false); // remove, enable, disable
                                        $API->write('=.id='.$data['.id']);
                                        $API->read();

                                    }
                                        $API->disconnect();
                                        echo "<p>Delete telah ditambahkan..<br>";
                                    }
                                    ?>

                                    <?php


function delQueue($id){
    require('routeros_api.class.php');

$API = new RouterosAPI();

$API->debug = false;

$API->connect('192.168.13.1', 'admin', '');
$API->write("/queue/simple/remove",false);
        $API->write('=.id='.$id,true);
        $API->read();
// $API->comm('/queue/simple/remove',array(
//     ".id" => '*' . $id,
//     ));
// $API->read();
}

// function  format bytes
function formatBytes($size, $decimals = 0){
$unit = array(
'0' => 'Byte',
'1' => 'KiB',
'2' => 'MiB',
'3' => 'GiB',
'4' => 'TiB',
'5' => 'PiB',
'6' => 'EiB',
'7' => 'ZiB',
'8' => 'YiB'
);

for($i = 0; $size >= 1024 && $i <= count($unit); $i++){
$size = $size/1024;
}

return round($size, $decimals).' '.$unit[$i];
}

// function  format bytes2
function formatBytes2($size, $decimals = 0){
$unit = array(
'0' => ' Byte',
'1' => ' KB',
'2' => ' MB',
'3' => ' GB',
'4' => ' TB',
'5' => ' PB',
'6' => ' EB',
'7' => ' ZB',
'8' => ' YB'
);

for($i = 0; $size >= 1000 && $i <= count($unit); $i++){
$size = $size/1000;
}

return round($size, $decimals).''.$unit[$i];
}


// function  format bites
function formatBites($size, $decimals = 0){
$unit = array(
'0' => 'bps',
'1' => 'kbps',
'2' => 'Mbps',
'3' => 'Gbps',
'4' => 'Tbps',
'5' => 'Pbps',
'6' => 'Ebps',
'7' => 'Zbps',
'8' => 'Ybps'
);

for($i = 0; $size >= 1000 && $i <= count($unit); $i++){
$size = $size/1000;
}

return round($size, $decimals).' '.$unit[$i];
}
?>
                                </table>
                            </div>
                        </div>
                    </div>