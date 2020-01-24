<div class="col-xl-12 col-lg-12">
    <div class="card shadow mb-4">
        <!-- Card Header -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Record Data Hari Ini</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="row">
                <?php 
                    error_reporting(0);
                    $json = file_get_contents(base_url('backend/get_list_today'));
                    $obj = json_decode($json, true);
                    $json_data = file_get_contents(base_url('backend/record_hari_ini'));
                    $obj_data = json_decode($json_data, true);
                    foreach($obj_data['results'] as $key_data => $value_data){
                        $data[$value_data['dokter']][$value_data['jam_praktik']] = $value_data;
                    }
                    foreach($obj['results'] as $key => $value){
                ?>
                <div onclick="openInNewTab('<?php echo base_url('call_antrian/'.$value['id'].'/'.$value['jam_praktik']) ?>')"  style="margin: 1vh; width: 50vh; cursor: pointer" >
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div>
                                    <div class="text-xs font-weight-bold text-primary text-uppercase">
                                        <b><?php echo $value['doctor_detail'] ?></b><br/><?php echo $value['jam_praktik'] ?>
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        Antrian : <?php echo $data[$value['id']][$value['jam_praktik']]['total']; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<script>
    function openInNewTab(url) {
        var win = window.open(url, '_blank');
        win.focus();
    }
</script>