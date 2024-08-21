<?php
$page_title = 'All Users';
require_once('includes/load.php');
?>
<?php
// Checkin What level user has permission to view this page
page_require_level(1);
// Pull out all users from the database
$all_users = find_all_user();
?>
<?php include_once('layouts/header.php'); ?>

<!-- Custom Styles -->
<style>
/* Panel Styles */
.panel {
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    background: #ffffff;
    border: none;
    margin-bottom: 30px;
}

.panel-heading {
    border-bottom: 1px solid #e0e0e0;
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px 8px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.panel-title {
    font-size: 22px;
    font-weight: 600;
}

.panel-body {
    padding: 20px;
}

.table {
    border-collapse: separate;
    border-spacing: 0;
}

.table-bordered {
    border: 1px solid #e0e0e0;
    border-radius: 8px;
    overflow: hidden;
}

.table-bordered th, .table-bordered td {
    border: 1px solid #e0e0e0;
    padding: 15px;
    vertical-align: middle;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: #f9f9f9;
}

.table-hover tbody tr:hover {
    background-color: #f1f1f1;
}

.btn-info, .btn-warning, .btn-danger {
    border-radius: 20px;
    transition: all 0.3s ease;
}

.btn-info {
    background-color: #007bff;
    border-color: #007bff;
}

.btn-info:hover {
    background-color: #0056b3;
    border-color: #004085;
}

.btn-warning {
    background-color: #ffc107;
    border-color: #ffc107;
}

.btn-warning:hover {
    background-color: #e0a800;
    border-color: #d39e00;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

.btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
}

.label-success {
    background-color: #28a745;
    border-radius: 20px;
}

.label-danger {
    background-color: #dc3545;
    border-radius: 20px;
}

.tooltip-inner {
    background-color: #333;
    color: #fff;
    font-size: 12px;
}

.tooltip-arrow {
    border-top: 5px solid #333;
}
</style>

<div class="row">
    <div class="col-md-12">
        <?php echo display_msg($msg); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                <h3 class="panel-title">
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Users</span>
                </h3>
                <a href="add_user.php" class="btn btn-info btn-sm">Add New User</a>
            </div>
            <div class="panel-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th class="text-center" style="width: 15%;">User Role</th>
                            <th class="text-center" style="width: 10%;">Status</th>
                            <th style="width: 20%;">Last Login</th>
                            <th class="text-center" style="width: 100px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($all_users as $a_user): ?>
                            <tr>
                                <td class="text-center"><?php echo count_id(); ?></td>
                                <td><?php echo remove_junk(ucwords($a_user['name'])); ?></td>
                                <td><?php echo remove_junk(ucwords($a_user['username'])); ?></td>
                                <td class="text-center"><?php echo remove_junk(ucwords($a_user['group_name'])); ?></td>
                                <td class="text-center">
                                    <?php if($a_user['status'] === '1'): ?>
                                        <span class="label label-success">Active</span>
                                    <?php else: ?>
                                        <span class="label label-danger">Deactive</span>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo read_date($a_user['last_login']); ?></td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <a href="edit_user.php?id=<?php echo (int)$a_user['id']; ?>" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Edit">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                        <a href="delete_user.php?id=<?php echo (int)$a_user['id']; ?>" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Remove">
                                            <i class="glyphicon glyphicon-remove"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include_once('layouts/footer.php'); ?>

<!-- Tooltip Initialization Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
