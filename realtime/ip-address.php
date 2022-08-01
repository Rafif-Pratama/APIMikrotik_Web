                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Daftar IP Address Client</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="150%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>IP Address</th>
                                            <th>MAC Address</th>
                                            <th>HOST Name</th>
                                            <th>Server</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <?php

                                    require('../routeros_api.class.php');

                                    $API = new RouterosAPI();

                                    $API->debug = false;

                                    if ($API->connect('192.168.13.1', 'admin', '')) {

                                       $results = $API->comm("/ip/dhcp-server/lease/print");

                                       foreach ($results as $data) {
                                            $clientAddress =  $data['address'];
                                            $clientMACAddress = $data['mac-address'];
                                            $clientHostName = $data['host-name'];
                                            $clientServer= $data['server'];
                                            $clientStatus = $data['status'];

                                            ?>
                                            <tbody>
                                        <tr>
                                            <td><?php echo $data['address'];
                                             ?></td>
                                            <td><?php echo $data['mac-address'];
                                             ?></td>
                                            <td><?php echo $data['host-name'];
                                             ?></td>
                                             <td><?php echo $data['server'];
                                             ?></td>
                                             <td><?php echo $data['status'];
                                             ?></td>
                                        </tr>
                            
                                    </tbody>
                                     <?php
                                        }


                                    }
                                    ?>
                                </table>
                            </div>
                        </div>