<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Location</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2>Add Country, Province, and City</h2>
        <form action="<?php echo site_url('locations/create_location'); ?>" method="post">
            <!-- Country Input -->
            <div class="mb-3">
                <label for="country_name" class="form-label">Country Name</label>
                <input type="text" class="form-control" id="country_name" name="country_name" required>
            </div>
            <!-- Province Input -->
            <div class="mb-3">
                <label for="province_name" class="form-label">Province Name</label>
                <input type="text" class="form-control" id="province_name" name="province_name" required>
            </div>
            <!-- City Input -->
            <div class="mb-3">
                <label for="city_name" class="form-label">City Name</label>
                <input type="text" class="form-control" id="city_name" name="city_name" required>
            </div>
            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</body>

</html>