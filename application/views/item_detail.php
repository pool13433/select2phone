<div class="row" style="margin-top:60px;">    
    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

        <section class="content-header">
            <h1>
                <?= $product->product_name ?>
                <small><?= $product->brand_name ?></small>             
                <?php if ($session['session_status']) { ?>
                    <a class="btn btn-primary btn-sm" href="<?= site_url('product/index/' . $product->product_id) ?>">
                        <i class="glyphicon glyphicon-plus-sign"></i> แก้ไข
                    </a>
                <?php } ?>
            </h1>            
        </section>

        <div id="loading-example" class="box box-danger">
            <div class="box-body no-padding">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <?$count=1;?>
                        <?php foreach ($feature as $key => $value) { ?>
                            <!-- Performanc-->
                            <section class="content-header">
                                <h3>               
                                    <i class="fa fa-dashboard"></i>  <u><?= $value['name_desc'] ?></u>
                                </h3>                                
                            </section>
                            <?if($count==3){?>
                            <h4><i class="glyphicon glyphicon-phone"></i>&nbsp;<?= $product->comment ?></h4>
                            <?}$count++;?>
                            <section class="content">
                                <!-- Small boxes (Stat box) -->
                                <div class="row">
                                    <?php foreach ($$value['variable_loop'] as $key => $attr) { ?>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <a class="small-box-footer" href="javascript:void(0)" 
                                               onclick="modalRelateTarget(<?= $product->product_id ?>, '<?= $key ?>',<?= $product->$key ?>, '<?= $attr['caption'] ?>', '<?= $attr['desc'] ?>')">
                                                <!-- small box -->
                                                <div class="small-box <?= $value['color'] ?>" >
                                                    <div class="inner">
                                                        <h5>
                                                            <strong><?php echo $attr['desc'] ?></strong>
                                                        </h5>
                                                        <h3>
                                                            <?= $product->$key != 0 ? $product->$key . " " . $attr['caption'] : "N/A" ?>                                                        
                                                        </h3>

                                                    </div>
                                                    <div class="icon">
                                                        <i class="<?php echo $attr['icon'] ?>"></i>
                                                    </div>
                                                    <span class="small-box-footer">ยี่ห้อ/รุ่น ที่เกี่ยวข้อง <i class="fa fa-arrow-circle-right"></i>
                                                    </span>      
                                                </div>
                                            </a>
                                        </div><!-- ./col -->
                                    <?php } ?>
                                </div>
                            </section>
                        <?php } ?>


                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="col-lg-3 col-md-3 col-md-12 col-xs-12">
        <?php include 'sidebar_brand.php'; ?>
    </div>
</div>

<?php include 'modal_relate.php'; ?>

<script type="text/javascript">
    function modalRelateTarget(productId, filed_name, value, caption, desc) {
        console.log('modalRelate');
        console.log('filed_name ::==' + filed_name);
        console.log('value::==' + value);

        $.ajax({
            url: '<?= site_url('mobile/search') ?>',
            data: {
                param4: filed_name,
                param5: value,
                param2: '',
                productId: productId
            },
            type: 'get',
            dataType: 'html',
            success: function (html) {
                var htmlPageSearch = $.parseHTML(html);
                var boxSearchPageId = $(htmlPageSearch).find('div#boxSearchResult');
                var boxProducts = $(boxSearchPageId).find('div.col-lg-4');
                //$(boxSearchPageId).find('.col-lg-3').removeClass().addClass('col-lg-4');
                console.log('boxSearchPageId ::==' + boxSearchPageId);
                console.log(boxProducts.length);
                if (boxProducts.length > 0) {
                    $('#boxLoadPriductRelate').html(boxSearchPageId);
                } else {
                    $('#boxLoadPriductRelate').html('<p>ไม่พบมือถือที่เกี่ยวข้อง</p>');
                }
                $('#caption').text(desc + '  ' + value + '  ' + caption);
            }
        });
        $('#modalRelate').modal('show');
    }
</script>
