<!-- Position Right--> 

<div class="box box-primary">
    <div class="box-header" style="cursor: move;">
        <i class="fa fa-phone-square"></i>
        <h3 class="box-title">มือถือมาใหม่</h3>
    </div><!-- /.box-header -->
    <div class="box-body">
        <ul class="todo-list ui-sortable">
            <?php foreach ($list_last_update as $key => $value) { ?>
                <li>
                
              
                    <a href="<?= site_url('mobile/item/'.$value->product_id.'?param1=&param2=') ?>">
                        <i class="fa fa-mobile"></i> <?php echo $value->product_name ?> <span class="badge"></span>
                    </a>
                </li>
            <?php } ?>                        
        </ul>
    </div><!-- /.box-body -->
    <div class="box-footer clearfix no-border">
        <a href="<?= site_url('mobile/search') ?>" class="btn btn-default pull-right"><i class="fa fa-phone-square"></i> มือถือทั้งหมด</a>
    </div>
</div>