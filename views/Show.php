<?php
    require_once('views/layouts/Header.php');
?>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>View User</h1>
                    <table class="table table-bordered">
                        <tr>
                            <td>ID</td>
                            <td><?php echo $user->id ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $user->email?></td>
                        </tr>
                        <tr>
                            <td>First name</td>
                            <td><?php echo $user->first_name?></td>
                        </tr>
                        <tr>
                            <td>Last name</td>
                            <td><?php echo $user->last_name?></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><?php echo $user->password?></td>
                        </tr>
                    </table>
                    <a type="button" href="/" class="btn btn-primary">Index Page</a>
                </div>
            </div>      
        </div>
    </div>
    <?php
        require_once('views/layouts/Footer.php');
    ?>
</body>
</html>