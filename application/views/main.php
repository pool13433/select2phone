<section class="content">
    <div class="row">
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

            <section class="content">
                <h4 class="page-header">
                    โทรศัพท์มือถือยี่ห้อแนะนำ
                </h4>
                <!-- Card Box-->
                <div class="row">
                    <?php foreach ($list_brand as $key => $brand) { ?>
                    	<?if($brand->cnt>0){?>
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <a class="small-box-footer" href="<?= site_url('mobile/search?param2=' . $brand->brand_id) ?>">
                            <!-- small box -->
                            <div class="small-box <?php echo (empty($colors[$key]) ? 'bg-gray' : $colors[$key]) ?>">
                                <div class="inner">
                                    <h3>
                                        <?= $brand->name_th ?>
                                    </h3>
                                    <p>
                                        ( <?= $brand->cnt ?> รุ่น )
                                    </p>
                                </div>
                                <div class="icon">
                                    <i class="glyphicon glyphicon-phone"></i>
                                </div>
          					<span class="small-box-footer">
                                                ข้อมูลมือถือยี่ห้อ <?= $brand->name_th ?> ทุกรุ่น ... <i class="fa fa-arrow-circle-right"></i>
                                            </span>                                
                                
                                
                            </div>
                            </a>
                        </div><!-- ./col -->
                    <?php }} ?>
                </div>  
            </section>


            <section class="content">
                <h4 class="page-header">
                    ข้อมูลโทรศัพท์มือถือ
                    <small></small>
                </h4>

                <!-- ********************* group 1 *************************-->
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-dashboard"></i> เน้นประสิทธิภาพ</h3>
                    </div>
                    <div class="box-body">
             <h4 class="page-header">
                            <small><i class="glyphicon glyphicon-hdd"></i> ความจุในตัวเครื่อง (Memory) </small>
                        </h4>
                        <div class="row">
                            <?php foreach ($list_rom as $key => $rom) { ?>                                            
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="<?= site_url('mobile/search?param4=rom_in&param5=' . $rom->data_value) ?>">
                                        <!-- Danger box -->
                                        <div class="small-box <?=(empty($colors[$key]) ? 'bg-gray' : $colors[$key])?>">
                                            <div class="inner">
												<h3>                                                    
                                                    <?= $rom->data_value==0?"N/A":$rom->data_value." GB"?> 
                                                </h3>
                                                <h4>
                                                    ( <?= $rom->data_cnt ?> รุ่น )
                                                </h4>                                            
                                             </div>
                                            <div class="icon">
                                                <i class="fa fa-hdd-o"></i>
                                            </div>
                                            <span class="small-box-footer">
                                                รุ่นมือถือที่เกี่ยวข้อง... <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>

                        <h4 class="page-header">
                            <small><i class="fa fa-credit-card"></i> ความจุภายนอกสูงสุด (Memory SD Card)</small>
                        </h4>
                        <div class="row">
                            <?php foreach ($list_rom_ext as $key => $romext) { ?>                                            
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="<?= site_url('mobile/search?param4=rom_ext&param5=' . $romext->data_value) ?>">
                                        <!-- Danger box -->
                                        <div class="small-box <?=(empty($colors[$key]) ? 'bg-gray' : $colors[$key])?>">
                                            <div class="inner">
												<h3>                                                    
                                                    <?= $romext->data_value==0?"N/A":$romext->data_value." GB"?> 
                                                </h3>
                                                <h4>
                                                    ( <?= $romext->data_cnt ?> รุ่น )
                                                </h4>                                            
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-credit-card"></i>
                                            </div>
                                            <span class="small-box-footer">
                                                รุ่นมือถือที่เกี่ยวข้อง... <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        <h4 class="page-header">                           
                            <small><i class="fa fa-cog"></i> ความเร็วหน่วยประมวลผล (CPU Speed)</small>
                        </h4>
                        <div class="row">
                            <?php foreach ($list_cpu_vol as $key => $speed) { ?>                                            
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="<?= site_url('mobile/search?param4=cpu_vol&param5=' . $speed->data_value) ?>">
                                        <!-- Danger box -->
                                        <div class="small-box <?=(empty($colors[$key]) ? 'bg-gray' : $colors[$key])?>">
                                            <div class="inner">
                                                <h3>                                                    
                                                    <?= $speed->data_value==0?"N/A":$speed->data_value." Ghz"?> 
                                                </h3>
                                                <h4>
                                                    ( <?= $speed->data_cnt ?> รุ่น )
                                                </h4>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-cogs"></i>
                                            </div>
                                            <span class="small-box-footer">
                                                รุ่นมือถือที่เกี่ยวข้อง... <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        

                        <h4 class="page-header">
                            <small><i class="fa fa-cogs"></i> จำนวนหน่วยประมวลผล (CPU Core)</small>
                        </h4>
                        <div class="row">
                            <?php foreach ($list_cpu_core as $key => $core) { ?>                                            
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="<?= site_url('mobile/search?param4=cpu_core&param5=' . $core->data_value) ?>">
                                        <div class="small-box <?=(empty($colors[$key]) ? 'bg-gray' : $colors[$key])?>">
                                            <div class="inner">
                                                <h3>                                                    
                                                    <?= $core->data_value==0?"N/A":$core->data_value." Core"?> 
                                                </h3>
                                                <h4>
                                                    ( <?= $core->data_cnt ?> รุ่น )
                                                </h4>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-cog"></i>
                                            </div>
                                            <span class="small-box-footer">
                                                รุ่นมือถือที่เกี่ยวข้อง... <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                        

                        <h4 class="page-header">
                            <small><i class="fa fa-save"></i> หน่วยความจำ (RAM)</small>
                        </h4>
                        <div class="row">
                            <?php foreach ($list_ram as $key => $ram) { ?>                                            
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="<?= site_url('mobile/search?param4=ram&param5=' . $ram->data_value) ?>">
                                        <!-- Danger box -->
                                        <div class="small-box <?=(empty($colors[$key]) ? 'bg-gray' : $colors[$key])?>">
                                            <div class="inner">
                                                <h3>                                                    
                                                    <?= $ram->data_value==0?"N/A":$ram->data_value." GB"?> 
                                                </h3>
                                                <h4>
                                                    ( <?= $ram->data_cnt ?> รุ่น )
                                                </h4>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-save"></i>
                                            </div>
                                            <span class="small-box-footer">
                                                รุ่นมือถือที่เกี่ยวข้อง... <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>                       
                    </div>
                </div>

                <!-- ********************* group 2 *************************-->
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-camera"></i> เน้นถ่ายรูป เซลฟี่</h3>
                    </div>
                    <div class="box-body">

                        <h4 class="page-header">                           
                            <small><i class="fa fa-camera-retro"></i>ควมละเอียดกล้องหน้า (MP = ล้านพิกเซล)</small>
                        </h4>
                        <div class="row">
                            <?php foreach ($list_cam_f as $key => $camf) { ?>                                            
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="<?= site_url('mobile/search?param4=cam_f&param5=' . $camf->data_value) ?>">
                                        <div class="small-box <?=(empty($colors[$key]) ? 'bg-gray' : $colors[$key])?>">
                                            <div class="inner">
                                                <h3>                                                    
                                                    <?= $camf->data_value==0?"N/A":$camf->data_value." MP"?> 
                                                </h3>
                                                <h4>
                                                    ( <?= $camf->data_cnt ?> รุ่น )
                                                </h4>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-camera-retro"></i>
                                            </div>
                                            <span class="small-box-footer">
                                                รุ่นมือถือที่เกี่ยวข้อง... <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>

                        <h4 class="page-header">
                            <small><i class="fa fa-camera"></i>ความละเอียดกล้องหลัง (MP = ล้านพิกเซล)</small>
                        </h4>
                        <div class="row">
                            <?php foreach ($list_cam_b as $key => $camb) { ?>                                            
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="<?= site_url('mobile/search?param4=cam_b&param5=' . $camb->data_value) ?>">
                                        <!-- Danger box -->
                                        <div class="small-box <?=(empty($colors[$key]) ? 'bg-gray' : $colors[$key])?>">
                                            <div class="inner">
												<h3>                                                    
                                                    <?= $camb->data_value==0?"N/A":$camb->data_value." MP"?> 
                                                </h3>
                                                <h4>
                                                    ( <?= $camb->data_cnt ?> รุ่น )
                                                </h4>                                            
                                             </div>
                                            <div class="icon">
                                                <i class="fa fa-camera"></i>
                                            </div>
                                            <span class="small-box-footer">
                                                รุ่นมือถือที่เกี่ยวข้อง... <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>

           
                    </div>
                </div>

                <!-- ********************* group 3 *************************-->
                <div class="box box-info">
                    <div class="box-header">
                        <h3 class="box-title"><i class="fa fa-legal"></i> เน้นประโยชน์ใช้สอย</h3>
                    </div>
                    <div class="box-body">
                        <!-- เน้นประสิทธิภาพ-->
  						<h4 class="page-header">
                            <small><i class="fa fa-ticket"></i> จำนวน Sim Card</small>
                        </h4>
                        <div class="row">
                            <?php foreach ($list_sim as $key => $sim) { ?>                                            
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="<?= site_url('mobile/search?param4=sim&param5=' . $sim->data_value) ?>">
                                        <!-- Danger box -->
                                        <div class="small-box <?=(empty($colors[$key]) ? 'bg-gray' : $colors[$key])?>">
                                            <div class="inner">
												<h3>                                                    
                                                    <?= $sim->data_value==0?"N/A":$sim->data_value." Sim"?> 
                                                </h3>
                                                <h4>
                                                    ( <?= $sim->data_cnt ?> รุ่น )
                                                </h4> 
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-ticket"></i>
                                            </div>
                                            <span class="small-box-footer">
                                                รุ่นมือถือที่เกี่ยวข้อง... <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>                        
                        <h4 class="page-header">                           
                            <small><i class="fa fa-tablet"></i> ขนาดหน้าจอ</small>
                        </h4>
                        <div class="row">
                            <?php foreach ($list_screen as $key => $screen) { ?>                                            
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="<?= site_url('mobile/search?param4=screen_size&param5=' . $screen->data_value) ?>">
                                        <div class="small-box <?=(empty($colors[$key]) ? 'bg-gray' : $colors[$key])?>">
                                            <div class="inner">
												<h3>                                                    
                                                    <?= $screen->data_value==0?"N/A":$screen->data_value." นิ้ว"?> 
                                                </h3>
                                                <h4>
                                                    ( <?= $screen->data_cnt ?> รุ่น )
                                                </h4>                                            
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-tablet"></i>
                                            </div>
                                            <span class="small-box-footer">
                                                รุ่นมือถือที่เกี่ยวข้อง... <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>

                        <h4 class="page-header">
                            <small><i class="fa fa-suitcase"></i> น้ำหนัก</small>
                        </h4>
                        <div class="row">
                            <?php foreach ($list_weight as $key => $weight) { ?>                                            
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="<?= site_url('mobile/search?param4=weight&param5=' . $weight->data_value) ?>">
                                        <!-- Danger box -->
                                        <div class="small-box <?=(empty($colors[$key]) ? 'bg-gray' : $colors[$key])?>">
                                            <div class="inner">
												<h3>                                                    
                                                    <?= $weight->data_value==0?"N/A":$weight->data_value." กรัม"?> 
                                                </h3>
                                                <h4>
                                                    ( <?= $weight->data_cnt ?> รุ่น )
                                                </h4> 
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-suitcase"></i>
                                            </div>
                                            <span class="small-box-footer">
                                                รุ่นมือถือที่เกี่ยวข้อง... <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>                      
 				<h4 class="page-header">
                            <small><i class="fa fa-flash"></i> ความจุแบตเตอรี่</small>
                        </h4>
                        <div class="row">
                            <?php foreach ($list_bat as $key => $batt) { ?>                                            
                                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <a href="<?= site_url('mobile/search?param4=batt&param5=' . $batt->data_value) ?>">
                                        <!-- Danger box -->
                                        <div class="small-box <?=(empty($colors[$key]) ? 'bg-gray' : $colors[$key])?>">
                                            <div class="inner">
                                                <h3>                                                    
                                                    <?= $batt->data_value==0?"N/A":$batt->data_value." Mah"?> 
                                                </h3>
                                                <h4>
                                                    ( <?= $batt->data_cnt ?> รุ่น )
                                                </h4>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-flash"></i>
                                            </div>
                                            <span class="small-box-footer">
                                                รุ่นมือถือที่เกี่ยวข้อง... <i class="fa fa-arrow-circle-right"></i>
                                            </span>
                                        </div>
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>

            </section>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <?php include 'sidebar_product_last.php'; ?>
        </div>
    </div>

</section>