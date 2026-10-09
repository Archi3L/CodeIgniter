<?php helper('url'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<h1>Edit User</h1>

<?php if (session('errors')): ?>
    <ul>
        <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post"
      action="<?= site_url('users/update/' . $user['id']) ?>"
      enctype="multipart/form-data">

    <?= csrf_field() ?>

    <label>Username:</label>
    <input type="text"
           name="username"
           value="<?= old('username', $user['username']) ?>">
    <br><br>

    <label>Full Name:</label>
    <input type="text"
           name="full_name"
           value="<?= old('full_name', $user['full_name']) ?>">
    <br><br>

    <label>New Password:</label>
    <input type="password" name="password">
    <small>Leave blank to keep the current password.</small>
    <br><br>

    <label>Avatar:</label>
    <input type="file"
           name="avatar"
           accept=".jpg,.jpeg,.png,image/jpeg,image/png">
    <br><br>

    <button type="submit">Update User</button>
</form>

<br>

<a href="<?= site_url('users') ?>">Back to Users</a>

</body>
</html>