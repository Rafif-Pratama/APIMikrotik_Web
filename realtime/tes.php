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

                                            ?>
                                            <tbody>
                                        <tr>
                                            <td><?php echo $data['name'];
                                             ?></td>
                                            <td><?php echo $data['target'];
                                             ?></td>
                                            <td><?php echo $data['max-limit'];
                                             ?></td>
                                             <td><?php echo $data['bytes'];
                                             ?></td>
                                        </tr>
                                        <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                         <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                         <tr>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                            <td> </td>
                                        </tr>
                                    </tbody>
                                    <?php
                                        }


                                    }
                                    ?>
                                    <?php
                                    function formatBytes($bytes, $decimal = null)
                                    {
                                        $satuan = [' Bytes', ' KB', ' MB', ' GB', ' TB'];
                                        $i = 0;
                                        while ($bytes > 1024){
                                            $bytes /= 1024;
                                            $i++;
                                        }
                                        return round($bytes, $decimal). '' . $satuan[$i];
                                    }

                                    ?>