<div class="page-content">

    <div class="row mt80 mb20">
        <div class="col-md-12">
            <h1 class="text-center">Pinoco</h1>
            <h4 class="text-center">- Job-support Corp. -</h4>
        </div>
    </div>

    <div class="row">
        <div class="alert alert-danger" id="authentication-error-area" role="alert"></div>
    </div>

    <form id="login-form">

            <div class="row">
                <div class="center-block login-form-area login-component ">
                    <label>ユーザーID</label>
                    <input type="text" class="form-control" name="user_id" placeholder="ユーザーID">
                    <span class="error-message-area" id="user_id-error-area"></span>
                </div>
            </div>

            <div class="row">
                <div class="center-block login-form-area login-component ">
                    <label>パスワード</label>
                    <input type="password" class="form-control" name="password" placeholder="パスワード">
                    <span class="error-message-area" id="password-error-area"></span>
                </div>
            </div>

            <div class="row">
                <div class="login-component login-button">
                    <button type="button" class="btn btn-md w200 btn-primary" id="login-btn" style="color:black;"> Login <span class="glyphicon glyphicon-new-window" aria-hidden="true"></span></button>
                </div>
            </div>

    </form>

</div>
<script type="text/javascript" src="<?= base_url();?>scripts/login/login.js"></script>