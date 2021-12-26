<?php
require_once('top.inc.php');
if (isset($_GET['type']) && $_GET['type'] != "") {
    $type = get_safe_value($con, $_GET['type']);
    if ($type == "status") {
        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);

        if ($operation == 'active')
            $status = 1;
        else 
            $status = 0;

        $update_status_sql = "UPDATE categories set status='$status' WHERE id='$id'";
        mysqli_query($con, $update_status_sql);
    } 
    else if ($type == "delete") {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "DELETE FROM categories WHERE id='$id'";
        mysqli_query($con, $delete_sql);
    }
}
// Get the data from the database;
$sql = "SELECT * FROM categories";
// Here the res contains the result of the query.
$res = mysqli_query($con, $sql);




?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Categories</h4>
                        <h4 class="box-link"><a href="add_category.php">Add Category</a></h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>ID</th>
                                        <th>Categories</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($res)) { ?>
                                        <tr>
                                            <td class="serial"><?php echo $i; ?></td>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><?php echo $row['category']; ?></td>
                                            <td><?php
                                                if ($row['status'] == 1)
                                                    echo "<a href='?type=status&operation=deactive&id=" . $row['id'] . "'><span class='badge badge-complete'> Active </span></a>&nbsp;";
                                                else
                                                    echo "<a href='?type=status&operation=active&id=" . $row['id'] . "'><span class='badge badge-pending'>Deactive</span></a></a>&nbsp;";

                                                echo "<a href='?type=delete&id=" . $row['id'] . "'><span class='badge badge-delete'>Delete</span></a>&nbsp;";
                                                echo "<a href='add_category.php?type=edit&id=".$row['id']."'><span class='badge badge-edit'>Edit</span></a>&nbsp;";
                                                ?>
                                            </td>
                                        </tr>
                                    <?php $i++;
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once('footer.inc.php');
?>