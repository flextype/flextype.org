<?php
namespace Flextype;
use Flextype\Component\{I18n\I18n, Registry\Registry, Http\Http, Form\Form, Token\Token};
?>
<?php
    Themes::view('admin/views/partials/head')
            ->assign('main_panel_class', 'width-full')
            ->display();
    Themes::view('admin/views/partials/content-start')->display();
?>


<?php echo Form::open(); ?>
    <?php echo Form::hidden('token', Token::generate()); ?>
    <div class="row">
        <div class="col-4 float-center">
            <h3 class="h3"><?php echo I18n::find('admin_login', Registry::get('system.locale')); ?></h3>

            <div class="form-group">
                <?php
                    echo (
                        Form::label('username', I18n::find('admin_username', Registry::get('system.locale')), ['for' => 'inputUsername']).
                        Form::input('username', '', ['class' => 'form-control', 'id' => 'inputUsername', 'required', 'autofocus'])
                    );
                ?>
            </div>

            <div class="form-group">
                <?php
                    echo (
                        Form::label('password', I18n::find('admin_password', Registry::get('system.locale')), ['for' => 'inputPassword']).
                        Form::password('password', '', ['class' => 'form-control', 'id' => 'inputPassword', 'required'])
                    );
                ?>
            </div>

            <div class="form-group">
                <?php echo Form::submit('login', I18n::find('admin_login', Registry::get('system.locale')), ['class' => 'btn btn-black']); ?>
            </div>
        </div>
    </div>
<?php echo Form::open(); ?>


<?php
    Themes::view('admin/views/partials/content-end')->display();
    Themes::view('admin/views/partials/footer')->display();
?>
