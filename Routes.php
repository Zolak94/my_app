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
Route::set('users/edit', function() {
    UserController::edit();
});
Route::set('users/update', function() {
    UserController::update();
});
Route::set('users/delete', function() {
    UserController::delete();
});
?>