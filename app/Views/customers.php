<?php helper(['url', 'security']); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Accounts</title>
</head>
<body>

<form action="<?= site_url('logout') ?>" method="post">
    <?= csrf_field() ?>
    <button type="submit">Log Out</button>
</form>

<h1>Customer Accounts</h1>

<a href="<?= site_url('customers/new') ?>">
    Add New Customer
</a>

<br><br>

<table border="1" cellpadding="8">
    <tr>
        <th>Full Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>

    <?php foreach ($customers as $customer): ?>
        <tr>
            <td><?= esc($customer['full_name']) ?></td>
            <td><?= esc($customer['email']) ?></td>
            <td><?= esc($customer['phone']) ?></td>
            <td>
                <a href="<?= site_url('customers/edit/' . $customer['id']) ?>">
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