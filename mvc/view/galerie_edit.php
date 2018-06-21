<div id="user-create">
    <?php

    $form = new Form('/galerie/doEdit');

    echo "<div class='option'>";
    echo '<select name="galerieauswahl">
    <option value="">Select...</option>';
    foreach($galerie AS $galerien){
        echo"<option value='$galerien->id'>$galerien->galeriename</option>";
    }
    echo '</select>';
    echo '</div>';
    echo $form->text()->label('Galeriename')->name('galeriename');
    echo "<div class='option'>";
    echo '<select name="privatsphäre">
    <option value="">Select...</option>
    <option value="oeffentlich">Öffentlich</option>
    <option value="privat">Privat</option>';
    echo "</div>";
    echo $form->submit()->label('Update Galerie')->name('send');
    echo $form->submit()->label('Delete Galerie')->name('delete');
    if (isset($errors['wrong'])) {
        echo $errors["wrong"];


        $form->end();
    }


    ?>
</div>