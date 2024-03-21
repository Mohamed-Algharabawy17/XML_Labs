<?php
    require_once('Functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Data XML</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="p-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <form method="post">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Enter name" value="<?php echo $currentEmployee['name'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" class="form-control" name="email" placeholder="Enter email" value="<?php echo $currentEmployee['email'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" placeholder="Enter phone number" value="<?php echo $currentEmployee['phone'] ?? ''; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" class="form-control" name="address" placeholder="Enter address" value="<?php echo $currentEmployee['address'] ?? ''; ?>">
                                </div>

                                <input type="hidden" name="currentIndex" value="<?php echo $currentEmployeeIndex; ?>">
                                <div class="mt-3 text-center">
                                    <button type="submit" class="btn btn-outline-dark pagination-btn" name="prev">&laquo;</button>
                                    <button type="submit" class="btn btn-outline-dark pagination-btn" name="next">&raquo;</button>
                                </div>
                                
                                <div class="mt-3 text-center">
                                    <button type="submit" class="btn btn-outline-success" name="submit">Insert</button>
                                    <button type="submit" class="btn btn-outline-primary" name="update">Update</button>
                                    <button type="submit" class="btn btn-outline-danger" name="delete">Delete</button>
                                </div>

                                
                                <div class="form-group mt-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="searchName" placeholder="Enter name to search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-info" name="search">Search</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <?php if (!empty($searchResults)) : ?>
            <div class="row justify-content-center mt-4">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Employee Data</h5>
                            <?php foreach ($searchResults as $employee) : ?>
                                <div>
                                    <strong>Name: </strong><?php echo $employee['name']; ?><br>
                                    <strong>Email: </strong><?php echo $employee['email']; ?><br>
                                    <strong>Phone: </strong><?php echo $employee['phone']; ?><br>
                                    <strong>Address: </strong><?php echo $employee['address']; ?><br>
                                </div>
                                <hr>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
</body>

</html>


