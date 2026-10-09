<!DOCTYPE html>
<html>
<head>
    <title>New Customer</title>
</head>
<body>

<h1>Add New Customer</h1>

<?php if (session('errors')): ?>
    <ul>
        <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" action="<?= site_url('customers/create') ?>">
    <?= csrf_field() ?>

    <label>Full Name:</label>
    <input type="text" name="full_name" value="<?= old('full_name') ?>">
    <br><br>

    <label>Email:</label>
    <input type="email" name="email" value="<?= old('email') ?>">
    <br><br>

    <label>Phone:</label>
    <input type="text" name="phone" value="<?= old('phone') ?>">
    <br><br>

    <button type="submit">Save Customer</button>
</form>

<a href="<?= site_url('customers') ?>">Back to Customers</a>

</body>
</html>