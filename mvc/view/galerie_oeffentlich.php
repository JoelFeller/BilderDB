<div id="user-create">
    <article class="hreview open special">
        <?php if (empty($galerie)): ?>
            <div class="dhd">
                <h2 class="item title">Woops! No galeries found.</h2>
            </div>
        <?php else: ?>
            <?php foreach ($galerie as $galerien): ?>
                <div class="panel panel-default">
                    <div class="panel-heading"><?= $galerien->galeriename ?></div>
                    <div class="panel-body">
                        <p style="color:black;" class="description"> User: <?= $user->username ?></a></p>
                        <p>
                            <a title="Anzeigen" href="/galerie/show">Anzeigen</a>
                        </p>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>
    </article>
</div>

