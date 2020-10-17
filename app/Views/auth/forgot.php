<?php get_header(); ?>
<style type="text/css">
  html,body,.container {
    height:100%;
  }
</style>
<div class="container" style="display:flex; align-items: center; justify-content: center;">
  <div class="row">
    <div class="col-lg-12">
      <section class="row login content pb-5 mb-5">
        <h2><strong>Reset password</strong></h2>
        
        <div class="row mb-3">
          <?php echo Notify::read(); ?>
        </div>

        <?php $user = filter_var(Input::previous('user'), FILTER_SANITIZE_STRING);?>
        <form method="post" action="<?php echo Uri::href('dashboard/auth/reset'); ?>">
            <div class="form-group">
                <?php echo Form::text('user', $user, [
                    'id'             => 'label-user',
                    'class' => 'form-control',
                    'autocapitalize' => 'off',
                    'autofocus'      => 'true',
                    'placeholder'    => __('users.username'),
                    'required'       => 'required'
                ]); ?>
            </div>

            <div class="form-group">
              <a class="text-link float-left mt-2" href="<?php echo Uri::href('dashboard/auth'); ?>">
                Back to <?php echo __('global.login'); ?>
              </a>
              <button type="submit" class="btn btn-dark px-4 float-right"><?php echo __('global.reset'); ?></button>
            </div>
          <input name="token" type="hidden" value="<?php echo $this->data['token']; ?>">
        </form>
      </section>
    </div>
  </div>
</div>
<?php get_footer() ?>
