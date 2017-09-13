<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <title><?= isset($title) ? $title : '' ?></title>
    <?= link_tag('css/bootstrap-3.3.7/css/bootstrap.min.css') ?>
    <?= link_tag('css/jquery.steps.css') ?>
    <?= link_tag('css/styles.css') ?>
    <?= link_tag('css/jquery-ui.min.css') ?>
    <script src="<?= base_url('js/jquery/jquery-3.2.1.min.js') ?>"></script>
    <script src="<?= base_url('js/bootstrap-3.3.7/dist/js/bootstrap.min.js') ?>"></script>
</head>
