<article class="hreview open special">
    <?php if (empty($galeries)): ?>
        <div class="dhd">
            <h2 class="item title">Woops! No galeries found.</h2>
        </div>
    <?php else: ?>
        <?php foreach ($galeries as $galerie): ?>
            <div class="panel panel-default">
                <div class="panel-heading"><?= $galerie->title ?></div>
                <div class="panel-body">
                    <img class="bild" src="<?php echo $galerie->image ?>"><?= $galerie->image; ?>
                    <p style="color:black;" class="description"> <br><?= $galerie->description; ?></p>
                    <p>
                        <?php
                        if($_SESSION['username'] == 'admin')
                        {
                            echo  '      <a title="Löschen" href="/galerie/delete?id='.$galerie->id.'">Delete</a>';
                        }
                        ?>
                    </p>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</article>
