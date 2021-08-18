<?php include "includes/head.php"; ?>
<?php
$getData = $conn->query("SELECT * FROM courses ORDER BY id DESC");

?>
<!-- Start info box -->
<div class="row mt-5">
    <div class="col-12">
        <div class="widget">
            <div class="widget-content" style="padding:10px;">
                <div class="table-responsive">
                    <table id="datatables-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Instructor</th>
                                <th>Belongs To</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Is Live?</th>
                                <th>Status</th>
                                <th>Original Price(&#8358;)</th>
                                <th>Discount Price(&#8358;)</th>
                                <th>Created At</th>
                                <th>...</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php while ($row = $getData->fetch(PDO::FETCH_OBJ)) { ?>
                                <tr>
                                    <!-- <td><?php $getUser = $conn->query("SELECT * FROM users WHERE id = '$row->user_id'");
                                                $user = $getUser->fetch(PDO::FETCH_OBJ);
                                                echo $user->username; ?></td> -->
                                    <td><?php echo $row->creator; ?></td>
                                    <td><?php echo $row->belongs_to; ?></td>
                                    <td><?php echo $row->title; ?></td>
                                    <td><?php $getCategory = $conn->query("SELECT * FROM categories WHERE id = '$row->category_id'");
                                        $category = $getCategory->fetch(PDO::FETCH_OBJ);
                                        echo $category->title; ?></td>
                                    <td><?php echo $row->islive ? "Yes" : "No"; ?></td>
                                    <td><?php echo $row->status; ?></td>
                                    <td><?php echo $row->price; ?></td>
                                    <td><?php echo $row->discount; ?></td>
                                    <td><?php echo $row->created_at; ?></td>
                                    <td><a href="course?id=<?php echo $row->id; ?>" class="btn btn-sm btn-info"><i class="fa fa-chevron-right"></i></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- End of info box -->


<?php include "includes/foot.php"; ?>