<?php
                                    require('routeros_api.class.php');
                                    if (isset($_POST['delete'])) {

                                    $API = new RouterosAPI();
                                    // Aktifkan debug
                                    $API->debug = false;
                                    $ARRAYS = $API->read();
                                    if ($API->connect('192.168.13.1', 'admin', ''))
                                    {       
                                                           
                                        $API->write('/queue/simple/remove', false); // remove, enable, disable
                                        $API->write('=.id='.$ARRAYS[0]['.id'],false);
                                        $API->read();

                                    }
                                        $API->disconnect();
                                        echo "<p>Delete telah ditambahkan..<br>";
                                    }
// function delQueue($id){
// 	require('routeros_api.class.php');

//     $API = new RouterosAPI();

//     $API->debug = false;

//     $API->connect('192.168.13.1', 'admin', '');

//     $API->comm("/queue/simple/remove",array(
//     	".id" => '*' . $id,
//     ));
//     $API->read();
// }
?>