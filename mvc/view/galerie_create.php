<div id="user-create">

<?php
Security::checkLogin();
$form = new Form('/galerie/doGalerie');

echo $form->text()->label('Titel')->name('title');
echo $form->text()->label('Privatsphäre')->name('privacy');
echo $form->text()->label('Beschreibung (max. 100)')->name('description');

echo "<p>Bild einfügen</p>";
echo $form->image()->label('')->name('image');

// echo $form->password()->label('Password')->name('password');
echo $form->submit()->label('Hochladen')->name('submitpicture');

$form->end();
?>

</div>
