<?php helper('url'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>User Accounts</title>
</head>
<body>

<h1>User Accounts</h1>

<a href="<?= site_url('users/new') ?>">Add New User</a>

<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>Avatar</th>
        <th>Username</th>
        <th>Full Name</th>
        <th>Role</th>
        <th>Action</th>
    </tr>

    <?php foreach ($users as $user): ?>

        <?php
        $avatarFile = trim((string) ($user['avatar'] ?? ''));

        $avatarUrl = $avatarFile !== ''
            ? base_url('uploads/avatars/' . $avatarFile)
            : base_url('uploads/avatars/placeholder.png');
        ?>

        <tr>
            <td>
                <img
                    src="<?= esc($avatarUrl) ?>"
                    alt="User avatar"
                    width="80"
                    height="80"
                >
            </td>

            <td><?= esc($user['username']) ?></td>

            <td><?= esc($user['full_name']) ?></td>

            <td><?= esc($user['role'] ?? '') ?></td>

            <td>
                <a href="<?= site_url('users/edit/' . $user['id']) ?>">
                    Edit
                </a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<br>

<a href="<?= site_url('/') ?>">Home</a>

</body>
</html>