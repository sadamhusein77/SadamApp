<!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-wrapper">
        <div class="content-wrapper-before"></div>
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-12 d-flex align-items-center justify-content-center">
        <div class="col-lg-4 col-md-6 col-10 box-shadow-2 p-0">
            <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
                <div class="card-header border-0">
                    <div class="text-center mb-1">
                        <img src="<?php echo base_url(); ?>assets/theme-assets/images/logo/logo.png" alt="branding logo">
                    </div>
                    <div class="font-large-1  text-center">
                        Recover Password
                    </div>
                    <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                        <span>We will send you a link to reset password.</span>
                    </h6>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form-horizontal" method="post" action="<?= base_url('auth/forgotpassword') ?>">
                            <fieldset class="form-group position-relative has-icon-left">
                                <input type="email" class="form-control round" id="user-email" name="email" placeholder="Your Email Address" value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                <div class="form-control-position">
                                    <i class="ft-mail"></i>
                                </div>
                            </fieldset>
                            <div class="form-group text-center">
                                    <button type="submit"class="btn round btn-block btn-glow btn-bg-gradient-x-purple-blue col-12 mr-1 mb-1">Reset Password</button>
                                </div>
                        </form>
                    </div>
                </div>
                <div class="card-footer border-0 p-0">
                    <p class="float-sm-center text-center">Not a member ?
                        <a href="<?= base_url('auth'); ?>" class="card-link">Sign Up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
        </div>
      </div>
    </div>
    <!-- END: Content-->
