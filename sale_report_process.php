<?php
error_reporting(E_ERROR | E_PARSE);
$page_title = 'Sales Report';
$results = '';
require_once('includes/load.php');
// Check user level to view this page
page_require_level(3);

?>

<?php
if (isset($_POST['submit'])) {
    $req_dates = array('start-date', 'end-date');
    validate_fields($req_dates);

    if (empty($errors)):
        $start_date = remove_junk($db->escape($_POST['start-date']));
        $end_date = remove_junk($db->escape($_POST['end-date']));
        $results = find_sale_by_dates($start_date, $end_date);
    else:
        $session->msg("d", $errors);
        redirect('sales_report.php', false);
    endif;

} else {
    $session->msg("d", "Select dates");
    redirect('sales_report.php', false);
}

?>
<!doctype html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f7f6;
        }

        .page-break {
            width: 100%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        .sale-head {
            margin: 20px 0;
            text-align: center;
        }

        .sale-head h1 {
            margin: 0;
            padding: 10px;
            font-size: 24px;
            font-weight: 700;
            border-bottom: 2px solid #007bff;
        }

        .sale-head strong {
            display: block;
            font-size: 16px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead th {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 10px;
            border: 1px solid #007bff;
        }

        table tbody td {
            text-align: center;
            padding: 10px;
            border: 1px solid #ddd;
        }

        table tfoot td {
            background-color: #f1f1f1;
            font-weight: 600;
            padding: 10px;
            border: 1px solid #ddd;
        }

        .text-right {
            text-align: right;
        }

        @media print {
            body {
                margin: 0;
            }
            .page-break {
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
<?php if ($results): ?>
    <div class="page-break">
        <div class="sale-head">
            <h1>Inventory Management System - Sales Report</h1>
            <strong><?php echo isset($start_date) ? $start_date : ''; ?> TO <?php echo isset($end_date) ? $end_date : ''; ?></strong>
        </div>
        <table>
            <thead>
            <tr>
                <th>Date</th>
                <th>Product Title</th>
                <th>Buying Price</th>
                <th>Selling Price</th>
                <th>Total Qty</th>
                <th>Total Amount</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($results as $result): ?>
                <tr>
                    <td><?php echo remove_junk($result['date']); ?></td>
                    <td><?php echo remove_junk(ucfirst($result['name'])); ?></td>
                    <td class="text-right"><?php echo number_format($result['buy_price'], 2); ?></td>
                    <td class="text-right"><?php echo number_format($result['sale_price'], 2); ?></td>
                    <td class="text-right"><?php echo number_format($result['total_sales']); ?></td>
                    <td class="text-right"><?php echo number_format($result['total_selling_price'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            <tfoot>
            <tr class="text-right">
                <td colspan="4"></td>
                <td>Grand Total</td>
                <td>Rs. <?php echo number_format(total_price($results)[0], 2); ?></td>
            </tr>
            <tr class="text-right">
                <td colspan="4"></td>
                <td>Profit</td>
                <td>Rs. <?php echo number_format(total_price($results)[1], 2); ?></td>
            </tr>
            </tfoot>
        </table>
    </div>
<?php else: ?>
    <div class="page-break">
        <div class="sale-head">
            <h1>No Sales Data Found</h1>
            <strong>Sorry, no sales data was found for the selected dates.</strong>
        </div>
    </div>
<?php endif; ?>
</body>
</html>
<?php if (isset($db)) { $db->db_disconnect(); } ?>
