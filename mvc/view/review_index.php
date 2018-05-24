<article class="hreview open special">
    <?php if (empty($reviews)): ?>
        <div class="dhd">
            <h2 class="item title">Woops! No reviews found.</h2>
        </div>
    <?php else: ?>
        <?php foreach ($reviews as $review): ?>
            <div class="panel panel-default">
                <div class="panel-heading"><?= $review->marke ?> <?= $review->modell; ?></div>
                <div class="panel-body">
                    <img class="bild" src="<?php echo $review->image ?>"><?= $review->image; ?>
                    <p style="color:black;" class="description"> <br><?= $review->review; ?></p>
                    <p>
                        <?php
                        if($_SESSION['username'] == 'admin')
                        {
                            echo  '      <a title="Löschen" href="/review/delete?id='.$review->id.'">Delete</a>';
                        }
                        ?>
                    </p>
                </div>
            </div>
        <?php endforeach ?>
    <?php endif ?>
</article>
