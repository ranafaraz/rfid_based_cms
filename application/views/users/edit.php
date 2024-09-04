<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h2>Edit User</h2>
        <form action="<?php echo site_url('users/update/' . $user->id); ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $user->name; ?>" required>
            </div>
            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <select class="form-control" id="country" name="country_id" required>
                    <option value="">Select Country</option>
                    <?php foreach ($countries as $country): ?>
                        <option value="<?php echo $country->id; ?>" <?php echo ($country->id == $user->country_id) ? 'selected' : ''; ?>><?php echo $country->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="province" class="form-label">Province</label>
                <select class="form-control" id="province" name="province_id" required>
                    <option value="">Select Province</option>
                    <?php foreach ($provinces as $province): ?>
                        <option value="<?php echo $province->id; ?>" <?php echo ($province->id == $user->province_id) ? 'selected' : ''; ?>><?php echo $province->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <select class="form-control" id="city" name="city_id" required>
                    <option value="">Select City</option>
                    <?php foreach ($cities as $city): ?>
                        <option value="<?php echo $city->id; ?>" <?php echo ($city->id == $user->city_id) ? 'selected' : ''; ?>><?php echo $city->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#country').change(function() {
                var country_id = $(this).val();
                if (country_id) {
                    $.ajax({
                        url: '<?php echo site_url('users/get_provinces_by_country/'); ?>' + country_id,
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#province').html('<option value="">Select Province</option>');
                            $.each(data, function(key, value) {
                                $('#province').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#province').html('<option value="">Select Province</option>');
                    $('#city').html('<option value="">Select City</option>');
                }
            });

            $('#province').change(function() {
                var province_id = $(this).val();
                if (province_id) {
                    $.ajax({
                        url: '<?php echo site_url('users/get_cities_by_province/'); ?>' + province_id,
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#city').html('<option value="">Select City</option>');
                            $.each(data, function(key, value) {
                                $('#city').append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#city').html('<option value="">Select City</option>');
                }
            });
        });
    </script>
</body>

</html>