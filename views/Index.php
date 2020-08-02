<?php
    require_once('views/layouts/Header.php');
?>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header clearfix">
                    <h2 class="float-left">Users</h2>
                    <a href="users/create" title="Add User" class="btn btn-success float-right">New User</a>
                </div>
                <?php
                if (count($users) > 0) {
                    echo "<table class='table table-bordered table-striped'>";
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>Avatar</th>";
                            echo "<th>ID</th>";
                            echo "<th>E-mail</th>";
                            echo "<th>First Name</th>";
                            echo "<th>Last Name</th>";
                            echo "<th>Action</th>";
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    foreach ($users as $user) {
                        echo "<tr>";
                        echo "<td><img src='/uploads/".$user->filename."' width='30' height='30'/></td>";
                        echo "<td>" . $user->id . "</td>";
                        echo "<td>" . $user->email . "</td>";
                        echo "<td>" . $user->first_name . "</td>";
                        echo "<td>" . $user->last_name . "</td>";
                        echo "<td>";
                        echo "<a href='users/show?id=". $user->id ."' class='btn btn-outline-primary btn-sm' title='View User' data-toggle='tooltip'><i class='fas fa-eye'></i></a>";
                        echo " <a href='users/edit?id=". $user->id ."' class='btn btn-outline-primary btn-sm' title='Update User' data-toggle='tooltip'><i class='fas fa-pen'></i></a>";
                        echo " <a href='users/delete?id=". $user->id ."' class='btn btn-outline-primary btn-sm' title='Delete User' data-toggle='tooltip'><i class='fas fa-trash-alt'></i></a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<p><em>No records were found in database.</em></p>";
                }
                ?>
            </div>
        </div>        
    </div>
    <?php
        require_once('views/layouts/Footer.php');
    ?>
</body>
</html>