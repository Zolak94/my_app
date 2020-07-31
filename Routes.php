<?php
Route::set('index.php', function() {
    UserController::index();
});
Route::set('users/create', function() {
    UserController::create();
});
?>