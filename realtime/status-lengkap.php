<div class="row">

    <?php

    require('../routeros_api.class.php');

    $API = new RouterosAPI();

    $API->debug = false;

    if ($API->connect('192.168.13.1', 'admin', '')) {

    $results = $API->comm("/system/resource/print");

    foreach ($results as $data) {
        $uptime =  $data['uptime'];
        $version = $data['version'];
        $buildtime = $data['build-time'];
        $freeMemory = $data['free-memory'];
        $totalMemory = $data['total-memory'];
        $cpu = $data['cpu'];   
        $cpucount = $data['cpu-count']; 
        $cpufrequncy = $data['cpu-frequency']; 
        $cpuload = $data['cpu-load']; 
        $freeHDDspace = $data['free-hdd-space']; 
        $totalHDDspace = $data['total-hdd-space'];                                      
        $badblocks = $data['bad-blocks']; 
        $architecture = $data['architecture-name']; 
        $boardname = $data['board-name']; 
        $platform  = $data['platform']; 
    }
    }
    ?>

    <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="150%" cellspacing="0" border="5px solid black">
                                    <thead>
                                        <tr>
                                            <th>System</th>
                                            <th>Values</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td> Uptime </td>
                                            <td><?php echo $uptime;
                                             ?></td>
                                        </tr>
                                        <tr>
                                            <td> Version </td>
                                            <td><?php echo $version;
                                             ?></td>
                                        </tr>
                                        <tr>
                                            <td> Build Time </td>
                                            <td><?php echo $buildtime;
                                             ?></td>
                                        </tr>
                                        <tr>
                                            <td> Free Memory </td>
                                            <td><?php echo formatBytes($freeMemory,2)  ;
                                             ?></td>
                                        </tr>
                                        <tr>
                                            <td> Total Memory </td>
                                            <td><?php echo formatBytes($totalMemory,2);
                                             ?></td>
                                        </tr>
                                        <tr>
                                            <td> CPU </td>
                                            <td><?php echo $cpu;
                                             ?></td>
                                        </tr>
                                        <tr>
                                            <td> CPU Count </td>
                                            <td><?php echo $cpucount;
                                             ?></td>
                                        </tr>
                                        <tr>
                                            <td> CPU Frequency </td>
                                            <td><?php echo $cpufrequncy;
                                             ?> Hz</td>
                                        </tr>
                                        <tr>
                                            <td> CPU Load </td>
                                            <td><?php echo $cpuload;
                                             ?> %</td>
                                        </tr>
                                        <tr>
                                            <td> Free Harddisk Space </td>
                                            <td><?php echo formatBytes($freeHDDspace,2);
                                             ?></td>
                                        </tr>
                                        <tr>
                                            <td> Total Harddisk Space </td>
                                            <td><?php echo formatBytes($totalHDDspace,2);
                                             ?></td>
                                        </tr>
                                        <tr>
                                            <td> Bad Blocks </td>
                                            <td><?php echo $badblocks;
                                             ?></td>
                                        </tr>
                                        <tr>
                                            <td> Architecture </td>
                                            <td><?php echo $architecture;
                                             ?></td>
                                        </tr>
                                        <tr>
                                            <td> Board Name </td>
                                            <td><?php echo $boardname;
                                             ?></td>
                                        </tr>
                                        <tr>
                                            <td> Platform </td>
                                            <td><?php echo $platform;
                                             ?></td>
                                        </tr>
                            
                                    </tbody>
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