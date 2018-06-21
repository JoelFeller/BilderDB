<div id="user-create">

<?php
Security::checkLogin();
$form = new Form('/bilder/doUpload');

echo $form->text()->label('Titel')->name('title');
echo $form->text()->label('Beschreibung (max. 100)')->name('description');
echo "<div class='option'>";
echo '<select name="galerieauswahl">
<option value="">Select...</option>';
foreach($galerie AS $galerien){
    echo"<option value='$galerien->id'>$galerien->galeriename</option>";
}
echo '</select>';
echo '</div>';
echo "<p>Bild einfügen</p>";
echo $form->image()->label('')->name('image');

// echo $form->password()->label('Password')->name('password');
echo $form->submit()->label('Hochladen')->name('submitpicture');

$form->end();
?>

</div>