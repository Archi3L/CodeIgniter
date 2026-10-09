<?php helper('url'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>New User</title>
</head>
<body>

<h1>Add New User</h1>

<?php if (session('errors')): ?>
    <ul>
        <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" action="<?= site_url('users/create') ?>">
    <?= csrf_field() ?>

    <label>Username:</label>
    <input type="text" name="username" value="<?= old('username') ?>">
    <br><br>

    <label>Full Name:</label>
    <input type="text" name="full_name" value="<?= old('full_name') ?>">
    <br><br>

    <label>Password:</label>
    <input type="password" name="password">
    <br><br>

    <button type="submit">Save User</button>
</form>

<a href="<?= site_url('users') ?>">Back to Users</a>

</body>
</html>