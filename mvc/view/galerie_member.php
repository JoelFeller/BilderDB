<div id="user-create">
    <article class="hreview open special">
        <?php if (empty($galerien)): ?>
            <div class="dhd">
                <h2 class="item title">Woops! No galeries found.</h2>
            </div>
        <?php else: ?>
            <?php foreach ($galerien as $galerie): ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><?= $galerie->galeriename ?></div>
                    <div class="panel-body">
                        <p>
                            <a title="Anzeigen" href="/galerie/show?galeriename=<?=$galerie->galeriename?>">Anzeigen</a>
                        </p>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </article>
</div>