
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="box box-warning">
            <form name="formBrand" id="formBrand" action="<?php echo site_url('brand/saveBrand'); ?>" method="POST">
                <div class="box-header">   
                    <h3 class="box-title">Brand Management</h3>        
                    <div class="box-tools pull-right">
                         <a href="<?php echo site_url('brand/index') ?>" class="btn btn-success">เพิ่ม</a>
                    </div>                                
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label>ฃื่อไทย</label>
                        <input type="hidden" name="brand_id" value="<?= $data_brand->brand_id ?>" />
                        <input type="text" name="name_th" value="<?= $data_brand->name_th ?>"
                               required="" autofocus
                               placeholder="Enter ..." class="form-control">
                    </div>

                    <div class="form-group">
                        <label>ชื่ออังกฤษ</label>
                        <input type="text" name="name_eng" value="<?= $data_brand->name_en ?>" 
                               required=""
                               placeholder="Enter ..." class="form-control">
                    </div>
                </div><!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-primary" type="submit">Submit</button>
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
                        <th>ชื่อไทย</th>
                        <th>ชื่่ออังกฤษ</th>
                        <th>โลโก้</th>
                        <th style="width: 15%">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_brand as $index => $brand) { ?>
                        <tr>
                            <td><?php echo $index ?></td>
                            <td><?php echo $brand->name_th ?></td>
                            <td><?php echo $brand->name_en ?></td>
                            <td><?php echo $brand->logo ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?php echo site_url('brand/index/' . $brand->brand_id) ?>" class="btn btn-info" type="button">แก้ไข</a>
                                    <a href="<?php echo site_url('brand/deleteBrand/' . $brand->brand_id) ?>" 
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
    $(document).ready(function () {

//        var url = '<?php echo site_url('index.php/brand/saveBrand'); ?>';
//        $('#formBrand').submit(function (e) {
//            var nameTh = $('input[name=name_th]').val();
//            var nameEng = $('input[name=name_eng]').val();
//            if (nameTh != '' && nameEng != '') {
//                return true;
////                $.ajax({
////                    url: url,
////                    data: $(this).serialize(),
////                    dataType: 'JSON',
////                    type: 'POST',
////                    success: function (response) {
////                        alert(response);
////                    },
////                    error: function () {
////
////                    }
////                })
//            } else {
//                alert('กรุณากรอกชื่อไทย และชื่ออังกฤษ');
//            }
//            e.preventDefault();
//        });
    });
</script>