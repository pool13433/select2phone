<!-- Position Right--> 
<div class="box box-primary">
    <div class="box-header" style="cursor: move;">
        <i class="fa fa-phone"></i>
        <h3 class="box-title">ยี่ห้อมือถือสมาร์ทโฟน</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <ul class="todo-list ui-sortable">
            <?php foreach ($brands as $key => $value) { ?>
                <li>
                    <a href="<?= site_url('mobile/search?param1=&param2='.$value->brand_id)?>"><i class="fa fa-mobile"></i> <?php echo $value->name_th ?></a>
                </li>
            <?php } ?>                        
        </ul>
    </div><!-- /.box-body -->
</div>