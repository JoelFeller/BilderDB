<div id="user-create">

<?php
Security::checkLogin();
$form = new Form('/review/doReview');

echo $form->text()->label('Brand')->name('marke');
echo $form->text()->label('Model')->name('modell');
echo $form->text()->label('Your review (max. 1000)')->name('review');

echo "<p>Insert picture of your car</p>";
echo $form->image()->label('')->name('image');

// echo $form->password()->label('Password')->name('password');
echo $form->submit()->label('Submit review')->name('sendreview');

$form->end();
?>

</div>
