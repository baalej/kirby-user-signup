<?php snippet('header') ?>
<div class="intro">
    <h1><?= $page->title() ?></h1>
</div>

<?php
// if the form has errors, show a list of messages
if (count($errors) > 0) : ?>
<ul class="alert">
    <?php foreach ($errors as $message) : ?>
        <li><?= kirbytext($message) ?></li>
    <?php endforeach ?>
</ul>
<?php endif ?>

<form method="post" action="<?= $page->url() ?>">
    <input type="hidden" name="csrf" value="<?= csrf() ?>">
    <div>
        <label for="name">Name</label>
        <input required type="text" id="name" name="name" value="<?= esc($data['name'] ?? '', 'attr') ?>">
    </div>
    <div>
        <label for="email">Email</label>
        <input required type="email" id="email" name="email" value="<?= esc($data['email'] ?? '', 'attr') ?>">
    </div>
    <div>
        <input type="submit" name="register" value="Register">
    </div>
</form>

<?php snippet('footer') ?>