<div class="row" style="margin-top:60px;">   
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
<h4 class="page-header">
   <?if($param2 != ""){?>
    <small><i class="fa fa-mobile-phone"></i> <strong><?= $brand->name_th?></strong> ( <?=$brand->cnt?> ชิ้น)</small>
   <?}else if($param4 != ""){
   	  $cpu_vol="ความเร็วหน่วยประมวลผล (CPU Speed)&nbsp;&nbsp;<u>".$param5. "</u> Ghz";
   	  $cpu_core="จำนวนหน่วยประมวลผล (CPU Core)&nbsp;&nbsp;<u>".$param5. "</u> Core";
   	  $ram="หน่วยความจำ (RAM)&nbsp;&nbsp;<u>".$param5. "</u> GB";
   	  $batt="ความจุแบตเตอรี่&nbsp;&nbsp;<u>".$param5. "</u> Mah";
   	  $cam_f="ควมละเอียดกล้องหน้า&nbsp;&nbsp;<u>".$param5. "</u> MP";
   	  $cam_b="ควมละเอียดกล้องหลัง&nbsp;&nbsp;<u>".$param5. "</u> MP";
   	  $rom_in="ความจุในตัวเครื่อง (Memory)&nbsp;&nbsp;<u>".$param5. "</u> GB";
   	  $rom_ext="ความจุภายนอกสูงสุด (Memory SD Card)&nbsp;&nbsp;<u>".$param5. "</u> GB";
   	  $screen_size="ขนาดหน้าจอ&nbsp;&nbsp;<u>".$param5. "</u> นิ้ว";
   	  $weight="น้ำหนัก&nbsp;&nbsp;<u>".$param5. "</u> กรัม";
   	  $sim="จำนวน Sim Card&nbsp;&nbsp;<u>".$param5. "</u> Sim";
   ?>
   	<small><i class="fa fa-mobile-phone"></i> <strong><?=" รายการมือถือที่มี ".$$param4?></strong></small>
   <?}else{?>
   	<small><i class="fa fa-mobile-phone"></i> <strong><?=" ผลการค้นหา ".$param1?></strong></small>
   <?}?>		 
</h4>
    
        <div id="boxSearchResult" class="row">
          <?php if (count($mobiles) > 0) { ?>
            <?php foreach ($mobiles as $key => $mobile) { ?>
                <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <a class="small-box-footer" href="<?php echo site_url('mobile/item/' . $mobile->product_id . '?param1=' . $params['param1'] . '&param2=' . $params['param2']) ?>">
                    <div class="small-box <?php echo (empty($colors[$key]) ? 'bg-gray' : $colors[$key]) ?>">
                        <div class="inner">
                            <h4 style="font-size:1.2em;font-weight:bold">
                                <i class="fa fa-mobile-phone"></i> <?= $mobile->product_name?>
                            </h4>
                            <p>
                               <i class="fa fa-cog"></i><?= " CPU: ".($mobile->cpu_vol!=0 ?$mobile->cpu_vol." Ghz":" N/A")?>                                
                               <?= $mobile->cpu_core!=0 ?"( ".$mobile->cpu_core." Core )":""?>                               
                               <BR><i class="fa fa-cog"></i><?= " RAM: ".($mobile->ram!=0 ?$mobile->ram." GB ":" N/A")?>
                               <?= " , MEM: ".($mobile->rom_in!=0 ?$mobile->rom_in." GB ":" N/A")?>
                            </p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-mobile-phone"></i>
                        </div>                        
              <span class="small-box-footer">             
                            รายละเอียด <i class="fa fa-arrow-circle-right"></i>
              </span>              
                    </div>
                    </a>
                </div>
            <?php } ?>
		<?php } else { ?>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <strong> ข้อมูล 0 ชิ้น</strong> ไม่พบข้อมูลมือถือที่ท่านกำลังค้นหา
                    </div>
                </div>
            <?php } ?>            
        </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <?php include 'sidebar_brand.php'; ?>
    </div>
</div>


