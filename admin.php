<?php
$page_title = 'Admin Home Page';
require_once('includes/load.php');
// Checkin What level user has permission to view this page
page_require_level(1);
?>
<?php
$c_categorie = count_by_id('categories');
$c_product = count_by_id('products');
$c_sale = count_by_id('sales');
$c_user = count_by_id('users');
$products_sold = find_higest_saleing_product('10');
$recent_products = find_recent_product_added('5');
$recent_sales = find_recent_sale_added('5');
?>
<?php include_once('layouts/header.php'); ?>

<style>
/* Custom Styles */
.panel-box {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    padding: 15px;
}

.panel-box:hover {
    transform: translateY(-10px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
}

.panel-icon {
    font-size: 24px;
    line-height: 1;
    display: inline-block;
    padding: 10px;
    border-radius: 50%;
    color: #fff;
    background: #f0f0f0;
    overflow: hidden;
}

.panel-icon i {
    font-size: 24px;
}

.bg-secondary1 { background-color: #007bff; }
.bg-red { background-color: #dc3545; }
.bg-blue2 { background-color: #007bff; }
.bg-green { background-color: #28a745; }

.panel-value {
    text-align: right;
}

.panel-value h2 {
    margin: 0;
    font-size: 24px;
    font-weight: bold;
}

.panel-value p {
    margin: 5px 0 0;
    color: #6c757d;
}

.table-striped > tbody > tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}

.list-group-item {
    display: flex;
    align-items: center;
    padding: 10px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 4px;
    transition: background-color 0.2s ease;
}

.list-group-item:hover {
    background-color: #f1f1f1;
}

.img-avatar {
    width: 40px;
    height: 40px;
    object-fit: cover;
    margin-right: 10px;
}

.list-group-item-heading {
    margin-bottom: 0;
    font-size: 16px;
}

.list-group-item-text {
    font-size: 14px;
    color: #6c757d;
}

.panel-heading {
    background: #f5f5f5;
    border-bottom: 1px solid #ddd;
    padding: 10px;
}

.panel-body {
    padding: 20px;
}

.panel-body canvas {
    width: 100%;
    height: auto;
}
</style>

<div class="row">
    <div class="col-md-6">
        <?php echo display_msg($msg); ?>
    </div>
</div>

<div class="row">
    <a href="users.php" style="color: black; text-decoration: none;">
        <div class="col-md-3">
            <div class="panel panel-box clearfix">
                <div class="panel-icon bg-secondary1">
                    <i class="glyphicon glyphicon-user"></i>
                </div>
                <div class="panel-value pull-right">
                    <h2 class="margin-top"><?php echo $c_user['total']; ?></h2>
                    <p class="text-muted">Users</p>
                </div>
            </div>
        </div>
    </a>

    <a href="categorie.php" style="color: black; text-decoration: none;">
        <div class="col-md-3">
            <div class="panel panel-box clearfix">
                <div class="panel-icon bg-red">
                    <i class="glyphicon glyphicon-th-large"></i>
                </div>
                <div class="panel-value pull-right">
                    <h2 class="margin-top"><?php echo $c_categorie['total']; ?></h2>
                    <p class="text-muted">Categories</p>
                </div>
            </div>
        </div>
    </a>

    <a href="product.php" style="color: black; text-decoration: none;">
        <div class="col-md-3">
            <div class="panel panel-box clearfix">
                <div class="panel-icon bg-blue2">
                    <i class="glyphicon glyphicon-shopping-cart"></i>
                </div>
                <div class="panel-value pull-right">
                    <h2 class="margin-top"><?php echo $c_product['total']; ?></h2>
                    <p class="text-muted">Products</p>
                </div>
            </div>
        </div>
    </a>

    <a href="sales.php" style="color: black; text-decoration: none;">
        <div class="col-md-3">
            <div class="panel panel-box clearfix">
                <div class="panel-icon bg-green">
                    <i class="glyphicon glyphicon-usd"></i>
                </div>
                <div class="panel-value pull-right">
                    <h2 class="margin-top"><?php echo $c_sale['total']; ?></h2>
                    <p class="text-muted">Sales</p>
                </div>
            </div>
        </div>
    </a>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Highest Selling Products</span>
                </strong>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Total Sold</th>
                            <th>Total Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products_sold as $product_sold): ?>
                            <tr>
                                <td><?php echo remove_junk(first_character($product_sold['name'])); ?></td>
                                <td><?php echo (int)$product_sold['totalSold']; ?></td>
                                <td><?php echo (int)$product_sold['totalQty']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Latest Sales</span>
                </strong>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-condensed">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Product Name</th>
                            <th>Date</th>
                            <th>Total Sale</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recent_sales as $recent_sale): ?>
                            <tr>
                                <td class="text-center"><?php echo count_id();?></td>
                                <td>
                                    <a href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>">
                                        <?php echo remove_junk(first_character($recent_sale['name'])); ?>
                                    </a>
                                </td>
                                <td><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
                                <td>$<?php echo remove_junk(first_character($recent_sale['price'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Recently Added Products</span>
                </strong>
            </div>
            <div class="panel-body">
                <div class="list-group">
                    <?php foreach ($recent_products as $recent_product): ?>
                        <a class="list-group-item clearfix" href="edit_product.php?id=<?php echo (int)$recent_product['id']; ?>">
                            <h4 class="list-group-item-heading">
                                <?php if ($recent_product['media_id'] === '0'): ?>
                                    <img class="img-avatar img-circle" src="uploads/products/no_image.png" alt="">
                                <?php else: ?>
                                    <img class="img-avatar img-circle" src="uploads/products/<?php echo $recent_product['image'];?>" alt="" />
                                <?php endif; ?>
                                <?php echo remove_junk(first_character($recent_product['name'])); ?>
                                <span class="label label-warning pull-right">
                                    Rs. <?php echo (int)$recent_product['sale_price']; ?>
                                </span>
                            </h4>
                            <p class="list-group-item-text">
                                Added on: <?php echo read_date($recent_product['date']); ?>
                            </p>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Analytics Chart -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <strong>
                    <span class="glyphicon glyphicon-stats"></span>
                    <span>Analytics Overview</span>
                </strong>
            </div>
            <div class="panel-body">
                <canvas id="analyticsChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>

<!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('analyticsChart').getContext('2d');
    var analyticsChart = new Chart(ctx, {
        type: 'bar', // You can change this to 'line', 'pie', etc.
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'], // Example labels
            datasets: [{
                label: 'Sales Overview',
                data: [12, 19, 3, 5, 2, 3], // Example data
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
