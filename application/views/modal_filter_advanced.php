<form name="" method="get" action="<?= site_url('mobile/search') ?>">
    <div id="modalFilterAdvanced" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">ตัวกรองข้อมูล</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label>ราคา</label>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <input type="text" name="name_th" autofocus
                                       placeholder="ราคาเริ่มต้น" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label>ถึง</label>
                            </div>
                        </div>                        
                        <div class="col-xs-3">
                            <div class="form-group">
                                <input type="text" name="name_th" autofocus
                                       placeholder="ราคาสูงสุด" class="form-control">
                            </div>
                        </div>   
                    </div>                    
                    
                    <div class="row">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label>หน่วยประมวลผล</label>
                            </div>
                        </div>
                        <div class="col-xs-3">
                            <div class="form-group">
                                <input type="text" name="name_th" autofocus
                                       placeholder="ราคาเริ่มต้น" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label>ถึง</label>
                            </div>
                        </div>                        
                        <div class="col-xs-3">
                            <div class="form-group">
                                <input type="text" name="name_th" autofocus
                                       placeholder="ราคาสูงสุด" class="form-control">
                            </div>
                        </div>   
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ปิดตัวกรองข้อมูล</button>
                    <button type="submit" class="btn btn-primary">เริ่มกรองข้อมูล</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</form>