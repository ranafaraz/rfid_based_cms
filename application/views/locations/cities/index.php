<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cities</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2>Cities</h2>
        <a href="<?php echo site_url('cities/create'); ?>" class="btn btn-primary mb-3">Add City</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Province</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cities as $city): ?>
                    <tr>
                        <td><?php echo $city->id; ?></td>
                        <td><?php echo $city->name; ?></td>
                        <td><?php echo $city->province_id; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>