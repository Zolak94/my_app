<?php
    require_once('views/layouts/Header.php');
?>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h1>Edit User</h1>
                <form method="post" action="/users/update">
                    <input hidden id="id" name="id" value="<?php echo $user[0]['id'];?>">
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?php echo $user[0]['email'];?>">
                    </div>
                    <div class="form-group">
                        <label>First name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name"
                            value="<?php echo $user[0]['first_name'];?>">
                    </div>
                    <div class="form-group">
                        <label>Last name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name"
                            value="<?php echo $user[0]['last_name'];?>">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" name="password"
                            value="<?php echo $user[0]['password'];?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                </div>
            </div>      
        </div>
    </div>
    <?php
        require_once('views/layouts/Footer.php');
    ?>
</body>
</html>