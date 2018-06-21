<div id="user-create">
    <article class="hreview open special">
        <?php if (empty($images)): ?>
            <div class="dhd">
                <h2 class="item title">Woops! No galeries found.</h2>
            </div>
        <?php else: ?>
            <?php foreach ($images as $image): ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><?= $image->image ?></div>
                    <div class="panel-body">
                        <p>
                            <a title="Anzeigen" href="/galerie/showpics">Anzeigen</a>
                        </p>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </article>
</div>