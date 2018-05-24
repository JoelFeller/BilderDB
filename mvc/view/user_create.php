<div id="user-create">
<?php

$form = new Form('/user/doCreate');

echo $form->text()->label('Benutzername')->name('username')->required(true);
echo $form->text()->label('Mail')->name('email')->required(true);
echo $form->password()->label('Password')->name('password')->required(true);

// echo $form->password()->label('Password')->name('password');
echo $form->submit()->label('Create user')->name('send');
if(isset($errors['wrong']))
{
    echo $errors["wrong"];
}

$form->end();


?>
</div>


