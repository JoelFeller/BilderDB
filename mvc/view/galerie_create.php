<div id="user-create">

<?php
Security::checkLogin();
$form = new Form('/galerie/doGalerie');

echo $form->text()->label('Galeriename')->name('galeriename');
echo "<div class='option'>";
echo '<select name="privatsphäre">
    <option value="">Select...</option>
    <option value="oeffentlich">Öffentlich</option>
    <option value="privat">Privat</option>';
echo "</div>";
echo $form->submit()->label('Erstellen')->name('galerieerstellen');

$form->end();
?>

</div>