<article class="hreview open special">
	<?php if (empty($users)): ?>
		<div class="dhd">
			<h2 class="item title">Woops! So users found.</h2>
		</div>
	<?php else: ?>
		<?php foreach ($users as $user): ?>
			<div class="panel panel-default">
				<div class="panel-heading"><?= $user->benutzername ?></div>
				<div class="panel-body">
					<p style="color:black;" class="description"> User: <?= $user->benutzername ?> EMail-Adresse: <a href="mailto:<?= $user->email; ?>"><?= $user->email; ?></a></p>
					<p>
						<a title="Löschen" href="/user/delete?id=<?= $user->id ?>">Delete</a>
					</p>
				</div>
			</div>
		<?php endforeach ?>
	<?php endif ?>
</article>