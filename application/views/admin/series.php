<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="box box-warning">
            <form name="formSeries" id="formSeries" action="<?php echo site_url('series/saveSeries'); ?>" method="POST">
                <div class="box-header">   
                    <h3 class="box-title">Series Management</h3>        
                    <div class="box-tools pull-right">
                        <a href="<?php echo site_url('series/index') ?>" class="btn btn-success">เพิ่ม</a>
                    </div>                                
                </div><!-- /.box-header -->
                <div class="box-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label>ฃื่อไทย</label>
                        <input type="hidden" name="series_id" value="<?= $data_series->series_id ?>" />
                        <input type="text" name="name_th" value="<?= $data_series->name_th ?>"
                               required="" autofocus
                               placeholder="Enter ..." class="form-control">
                    </div>

                    <div class="form-group">
                        <label>ชื่ออังกฤษ</label>
                        <input type="text" name="name_eng" value="<?= $data_series->name_en ?>" 
                               required=""
                               placeholder="Enter ..." class="form-control">
                    </div>
                    <div class="form-group">
                        <label>ชื่อยี่ห้อ</label>
                        <select class="form-control" name="brand_id">
                            <?php foreach ($data_brand as $key => $brand) { ?>
                                <?php if ($data_series->brand_id == $brand->brand_id) { ?>
                                    <option value="<?= $brand->brand_id ?>" selected><?= $brand->name_th ?></option>
                                <?php } else { ?>
                                    <option value="<?= $brand->brand_id ?>"><?= $brand->name_th ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
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
                        <th>ยี้ห้อ</th>
                        <th style="width: 15%">#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($list_series as $index => $series) { ?>
                        <tr>
                            <td><?php echo $index ?></td>
                            <td><?php echo $series->series_name_th ?></td>
                            <td><?php echo $series->series_name_en ?></td>
                            <td><?php echo $series->brand_name_th ?></td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?php echo site_url('series/index/' . $series->series_id) ?>" class="btn btn-info" type="button">แก้ไข</a>
                                    <a href="<?php echo site_url('series/deleteSeries/' . $series->series_id) ?>" 
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