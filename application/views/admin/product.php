<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="box box-warning">
            <form name="formProduct" id="formProduct" action="<?php echo site_url('product/saveProduct'); ?>" method="POST">
                <div class="box-header">   
                    <h3 class="box-title">Product Management</h3>        
                    <div class="box-tools pull-right">
                        <a href="javascript:void(0)" id="btnCopy" class="btn btn-primary">Copy ข้อมูล</a>
                        <a href="<?php echo site_url('product/index') ?>" class="btn btn-success">เพิ่ม</a>
                    </div>                                
                </div><!-- /.box-header -->
                <div class="box-body">

                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label>ชื่อมือถือ</label>
                                <input type="hidden" name="product_id" id="product_id" value="<?= $data_product->product_id ?>" />
                                <input type="text" name="product_name" value="<?= $data_product->product_name ?>"
                                       autofocus placeholder="Enter ..." class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label>รุ่น</label>
                                <input type="text" name="series" value="<?= $data_product->series ?>" 

                                       placeholder="Enter ..." class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label>ราคา</label>
                                <input type="text" name="price_url" value="<?= $data_product->price_url ?>"
                                       placeholder="Enter ..." class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label>น้ำหนัก</label>
                                <input type="text" name="weight" value="<?= $data_product->weight ?>" 

                                       placeholder="Enter ..." class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label>ชื่อยี่ห้อ</label>
                                <select class="form-control" name="brand_id" required>
                                    <option value="">-- เลือก--</option>
                                    <?php foreach ($data_brand as $key => $brand) { ?>
                                        <?php var_dump($brand->brand_id) ?>
                                        <?php if ($data_product->brand_id == $brand->brand_id) { ?>
                                            <option value="<?= $brand->brand_id ?>" selected="selected"><?= $brand->name_th ?></option>
                                        <?php } else { ?>
                                            <option value="<?= $brand->brand_id ?>"><?= $brand->name_th ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label>ขนาดหน้าจอ</label>
                                <input type="text" name="screen_size" value="<?= $data_product->screen_size ?>"

                                       placeholder="Enter ..." class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label>sim</label>
                                <input type="text" name="sim" value="<?= $data_product->sim ?>" 
                                       placeholder="Enter ..." class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label>หน่วยความจำชั่วคราว</label>
                                <input type="text" name="ram" value="<?= $data_product->ram ?>" 
                                       placeholder="Enter ..." class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="form-group">
                                <label>แบตเตอรี่</label>
                                <input type="text" name="batt" value="<?= $data_product->batt ?>" 
                                       placeholder="Enter ..." class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label>จำนวน CPU</label>
                                <input type="text" name="cpu_core" value="<?= $data_product->cpu_core ?>"
                                       placeholder="Enter ..." class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>ความเร็ว CPU</label>
                                <input type="text" name="cpu_vol" value="<?= $data_product->cpu_vol ?>" 
                                       placeholder="Enter ..." class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label>หน่วยความจำในเครื่อง</label>
                                <input type="text" name="rom_in" value="<?= $data_product->rom_in ?>" 
                                       placeholder="Enter ..." class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label>หน่วยความจะภายนอก</label>
                                <input type="text" name="rom_ext" value="<?= $data_product->rom_ext ?>"
                                       placeholder="Enter ..." class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label>กล้องหน้า</label>
                                <input type="text" name="cam_f" value="<?= $data_product->cam_f ?>" 
                                       placeholder="Enter ..." class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>กล้องหลัง</label>
                                <input type="text" name="cam_b" value="<?= $data_product->cam_b ?>" 
                                       placeholder="Enter ..." class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">                        
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label>ประกัน</label>
                                <input type="text" name="prod_url" value="<?= $data_product->prod_url ?>" 
                                       placeholder="Enter ..." class="form-control">
                            </div>
                        </div> 
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label>ที่เกี่ยวข้อง</label>
                                <input type="text" name="relatelink" value="<?= $data_product->relatelink ?>"
                                       placeholder="Enter ..." class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <label>embed</label>
                                <input type="text" name="embed" value="<?= $data_product->embed ?>" 
                                       placeholder="Enter ..." class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <label>อธิบาย</label>
                                <textarea name="comment" class="form-control" rows="4"><?= $data_product->comment ?></textarea>
                            </div>
                        </div>
                    </div>

                </div><!-- /.box-body -->
                <div class="box-footer">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-5">
                            <button class="btn btn-primary" id="btnSubmit" type="submit">บันทึกข้อมูลใหม่</button>
                            <button class="btn btn-warning" type="reset">Clear</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>   <!-- /.row -->
    <div class="row">
        <div class="box box-warning">
            <table class="table table-bordered datatable">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>ชื่อ</th>
                        <th>ยี่ห้อ</th>
                        <th>คุณสมบัติ</th>
                        <th>หน่วยความจำ</th>
                        <th>กล้อง</th>
                        <th>ราคา</th>
                        <th style="width: 15%">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_product as $index => $product) { ?>
                        <tr>
                            <td><?php echo $index ?></td>
                            <td><?php echo $product->product_name ?></td>
                            <td><?php echo $product->brand_name_th ?></td>
                            <td>
                                <?php
                                echo 'series :: ' . $product->series . '<br/>' .
                                'น้ำหนัก :: ' . $product->weight . '<br/>' .
                                'หน้าจอ :: ' . $product->screen_size . '<br/>' .
                                'sim :: ' . $product->sim . '<br/>' .
                                'แบต :: ' . $product->batt . '<br/>' .
                                'CPU หลัก :: ' . $product->cpu_core . '<br/>' .
                                'รุ่น CPU :: ' . $product->cpu_vol . '<br/>' .
                                'แบต :: ' . $product->batt . '<br/>';
                                ?>
                            </td>
                            <td>
                                <?php
                                echo 'ram :: ' . $product->ram . '<br/>' .
                                'rom ใน :: ' . $product->rom_in . '<br/>' .
                                'rom นอก :: ' . $product->rom_ext . '<br/>';
                                ?>
                            </td>
                            <td>
                                <?php
                                echo 'กล้องหน้า :: ' . $product->cam_f . '<br/>' .
                                'กล้องหลัง :: ' . $product->cam_b . '<br/>';
                                ?>
                            </td>
                            <td><?php echo $product->price_url ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?php echo site_url('product/index/' . $product->product_id) ?>" class="btn btn-info" type="button">แก้ไข</a>
                                    <a href="<?php echo site_url('product/deleteProduct/' . $product->product_id) ?>" 
                                       onclick="return confirm('ยืนยันการลบ')"
                                       class="btn btn-danger" type="button">ลบ</a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(function () {
        $('#btnCopy').on('click', function () {
            $('#product_id').val('');
            $('#btnSubmit').text('บันทึกข้อมูลจากการ Copy');
        });
        $('#formProduct input,#formProduct select,#formProduct textarea').on('change', function () {
            colorInput(this);
        });
        foreachInputBlank();
    });
    function foreachInputBlank() {
        var inputs = $('#formProduct input,#formProduct select,#formProduct textarea');
        $.each(inputs, function () {
            colorInput(this)
        });
    }
    function colorInput(input) {
        if ($(input).val() != '') {
            $(input).css({'background-color': 'green', 'color': 'white'})
        } else {
            $(input).css({'background-color': 'red', 'color': 'black'})
        }
    }
</script>