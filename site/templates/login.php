<?php snippet('header') ?>

<div class="intro">
<h1><?= $page->title()->html() ?></h1>
</div>

<article>
    <div class="text">
        <?php if($error): ?>
        <div class="alert"><?= $error ?></div>
        <?php endif ?>

        <form method="post" action="<?= $page->url() ?>">
            <input type="hidden" name="csrf" value="<?= csrf() ?>">
            <?php if($status === 'inactive'): ?>
            <div>
                <label for="email">Email:</label>
                <input id="email" name="email" required type="email"  value="<?= esc($email, 'attr') ?>">
            </div>
            <?php endif ?>

            <?php if ($status === 'pending'): ?>
            <div>
                <label for="name">Login Code</label>
                <input id="code" name="code" placeholder="000 000" required type="text">
                <p><small>If your email address is registered, the requested code was sent via email.</small></p>
            </div>
            <?php endif ?>
            <div>
                <input type="submit" name="login" value="Log in">
            </div>

        </form>
    </div>
</article>

<?php snippet('footer') ?>