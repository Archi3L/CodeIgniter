<?php helper('url'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
</head>
<body>

<h1>Edit Customer</h1>

<?php if (session('errors')): ?>
    <ul>
        <?php foreach (session('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form method="post" action="<?= site_url('customers/update/' . $customer['id']) ?>">
    <?= csrf_field() ?>

    <label>Full Name:</label>
    <input type="text" name="full_name"
           value="<?= old('full_name', $customer['full_name']) ?>">
    <br><br>

    <label>Email:</label>
    <input type="email" name="email"
           value="<?= old('email', $customer['email']) ?>">
    <br><br>

    <label>Phone:</label>
    <input type="text" name="phone"
           value="<?= old('phone', $customer['phone']) ?>">
    <br><br>

    <button type="submit">Update Customer</button>
</form>

<a href="<?= site_url('customers') ?>">Back to Customers</a>

</body>
</html>