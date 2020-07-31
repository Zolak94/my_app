<?php
Route::set('index.php', function() {
    UserController::index();
});
Route::set('users/create', function() {
    UserController::create();
});
Route::set('users/store', function() {
    UserController::store();
});
Route::set('users/show', function() {
    UserController::show();
});
?>