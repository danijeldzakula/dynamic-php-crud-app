<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title - (update dynamic) -->
    <title>Dashboard | <?= $title; ?></title>
    <!-- Inject style -->
    <link rel="stylesheet" href="<?= (basename($_SERVER['PHP_SELF']) === 'index.php' ? './src/assets/styles/main.css' : './src/assets/styles/main.css'); ?>">
</head>
<body>
    <div class="app">