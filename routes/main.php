<?php

Route::get('/')->controller('HomeController', ['index']);

Route::get('/{lang}')->controller('ArticleController', ['welcome'])->name('welcome');
Route::get('/{lang}/philosophy')->controller('ArticleController', ['philosophy']);
Route::get('/{lang}/metrica')->controller('ArticleController', ['metrica']);
