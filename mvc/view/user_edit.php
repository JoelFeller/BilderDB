<div id="user-create">
    <?php

    $form = new Form('/user/doEdit');

    echo $form->text()->label('Benutzername')->name('username')->required(false);
    echo $form->password()->label('Passwort')->name('password')->required(false);
    echo $form->password()->label('Passwort wiederholen')->name('password2')->required(false);
    echo $form->submit()->label('Update User')->name('send');
    echo $form->submit()->label('Delete User')->name('delete');
    if (isset($errors['wrong'])) {
        echo $errors["wrong"];


        $form->end();
    }


    ?>
</div>