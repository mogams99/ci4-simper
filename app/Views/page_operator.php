<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->include('layout/head'); ?>
</head>

<body class="animsition">
    <?= $this->include('layout/sidebar_operator'); ?>

    <?= $this->include('layout/navbar_operator'); ?>

    <?= $this->renderSection('content_operator'); ?>

    <?= $this->include('layout/js'); ?>
</body>

</html>