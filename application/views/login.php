<div class="row">
    <div class="col-lg-4 col-lg-offset-4">
        <fieldset style="margin-top: 50px;">
            <legend>Login เข้าสู่ระบบ</legend>
            <form action="<?= site_url('mobile/initSession') ?>" method="post" class="form-horizontal">
                <?php if (!empty($message)) { ?>
                    <div class="alert alert-danger">
                        <?= $message ?>
                    </div>
                <?php } ?>
                <table border="1" class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>username</td>
                            <td><input type="text" class="form-control" name="username" required/></td>
                        </tr>
                        <tr>
                            <td>password</td>
                            <td><input type="password" class="form-control" name="password" required/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" class="btn btn-primary btn-lg">Login Now..</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>

        </fieldset>
    </div>
</div>
