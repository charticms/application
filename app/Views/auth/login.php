<?php view('globals/header', null, 'dashboard') ?>
<style type="text/css">
    html,body,.container {
        height:100%;
    }
</style>
<div class="container" style="display:flex; align-items: center; justify-content: center;">
    <div class="row">
        <div class="col-lg-12">
            <section class="row login content pb-5 mb-5">
                <h2><strong>Sign In</strong></h2>
        
                <div class="row mb-3">
                  <?php echo Notify::read(); ?>
                </div>

                <form method="post" action="<?php echo Uri::href('dashboard/auth'); ?>">
                    <div class="form-group">
                      <label for="label-user"><?php echo __('users.username'); ?>:</label>
                        <?php echo Form::text('user', '', [
                            'id'             => 'label-user',
                            'class' => 'form-control',
                            'autocapitalize' => 'off',
                            'autofocus'      => 'true',
                            'placeholder'    => __('users.username'),
                            'required'       => 'required'
                        ]); ?>
                    </div>

                    <div class="form-group">
                      <label for="label-pass"><?php echo __('users.password'); ?>:</label>
                        <?php echo Form::password('pass', [
                            'id'           => 'pass',
                            'class'        => 'form-control',
                            'placeholder'  => __('users.password'),
                            'autocomplete' => 'off',
                            'required' => 'required'
                        ]); ?>
                    </div>

                    <div class="form-group">
                      <a class="text-link float-left mt-2" href="<?php echo Uri::href('dashboard/auth/reset'); ?>"><?php echo __('users.forgotten_password'); ?></a>
                        <button type="submit" class="btn btn-dark px-4 float-right"><?php echo __('global.login'); ?></button>
                    </div>
                    <?php echo csrf_field(); ?>
                </form>
            </section>
        </div>
    </div>
</div>
<?php view('globals/meta/foot', null, 'dashboard') ?>