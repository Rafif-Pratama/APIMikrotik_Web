                        <div class="row">

                        <!-- Card Item -->
                        <?php
                        require('../routeros_api.class.php');

                        $API = new RouterosAPI();

                        // Aktifkan debug
                        $API->debug = false;
                        if ($API->connect('192.168.13.1', 'admin', ''))
                        {
                            $results = $API->comm('/system/resource/print');
                            foreach ($results as $data) {
                                $uptime =  $data['uptime'];
                                $freeMemory = $data['free-memory'];
                                $totalMemory = $data['total-memory'];
                                $cpuLoad = $data['cpu-load'];
                                $freeHDDspace = $data['free-hdd-space'];
                                $totalHDDspace = $data['total-hdd-space'];
                                $memoryUsage = $totalMemory - $freeMemory;
                                $persenMemory = $memoryUsage / $totalMemory * 100;
                            }
                        }

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
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                CPU Load</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cpuLoad ?>
                                        %</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-microchip fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Item -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Free Memory</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo formatBytes($freeMemory,2)
                                        ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-memory fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Item -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Memory</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo formatBytes($totalMemory,2) ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-memory fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Item -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Memory Usage
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo round($persenMemory)  ?> %</div>
                                                </div>
                                                <div></div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width:  <?php echo round($persenMemory) ?>%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Card Item -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Uptime</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $uptime ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clock fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>