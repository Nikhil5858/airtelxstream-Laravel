<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CastContentController;
use App\Http\Controllers\Admin\CastController;
use App\Http\Controllers\Admin\CastRoleController;
use App\Http\Controllers\Admin\EpisodesController;
use App\Http\Controllers\Admin\GenreController;
use App\Http\Controllers\Admin\HomepageSectionController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\OttController;
use App\Http\Controllers\Admin\SeasonController;
use App\Http\Controllers\Admin\SubscriptionsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\WatchlistController;
use App\Http\Controllers\Frontend\GenreController as FrontendGenreController;
use App\Http\Controllers\Frontend\SearchController;
use App\Http\Controllers\Frontend\FreeController;
use App\Http\Controllers\Frontend\MyplanController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

Route::post('/auth/send-otp', [FrontendAuthController::class, 'sendOtp'])
    ->name('auth.sendOtp');

Route::post('/auth/verify-otp', [FrontendAuthController::class, 'verifyOtp'])
    ->name('auth.verifyOtp');

Route::post('/logout', [FrontendAuthController::class, 'logout'])
    ->name('logout');
    
    
Route::middleware(['auth', 'role:user'])->group(function () {     

    Route::post('/movie/add-watchlist', [WatchlistController::class, 'store'])
        ->name('watchlist.store');

    Route::get('/genre/{genre}', [FrontendGenreController::class, 'show'])
        ->name('genre.show');

    Route::get('/ott/{ott}', [OttController::class, 'show'])
        ->name('ott.show');

    Route::get('/search', [SearchController::class, 'index'])
        ->name('search');

    Route::get('/free', [FreeController::class, 'index'])
        ->name('free');

    Route::get('/search/results', [SearchController::class, 'results'])
    ->name('search.results');

    Route::get('/myplan', [MyPlanController::class, 'index'])
    ->name('myplan');

});

Route::prefix('admin')->group(function () {

    Route::get('/login', [AuthController::class, 'showLoginForm'])
        ->name('admin.login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('admin.login.submit');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('admin.logout');

    Route::middleware(['auth', 'role:admin'])->group(function () {

        // Dashboard
        Route::get('/admindashboard', [AdminDashboardController::class, 'index'])
            ->name('admin.dashboard');

        // Subscriptions
        Route::get('/subscriptions', [SubscriptionsController::class, 'index'])
            ->name('admin.subscriptions');

        Route::post('/subscriptions', [SubscriptionsController::class, 'store'])
            ->name('admin.subscriptions.store');

        Route::put('/subscriptions/{subscription}', [SubscriptionsController::class, 'update'])
            ->name('admin.subscriptions.update');

        Route::delete('/subscriptions/{subscription}', [SubscriptionsController::class, 'destroy'])
            ->name('admin.subscriptions.delete');

        // Movie
        Route::get('/movie', [MovieController::class, 'index'])
            ->name('admin.movie');

        Route::post('/movie', [MovieController::class, 'store'])
            ->name('admin.movie.store');

        Route::put('/movie/{movie}', [MovieController::class, 'update'])
            ->name('admin.movie.update');

        Route::delete('/movie/{movie}', [MovieController::class, 'destroy'])
            ->name('admin.movie.delete');

        // Season
        Route::get('/season', [SeasonController::class, 'index'])
            ->name('admin.season');

        Route::post('/season', [SeasonController::class, 'store'])
            ->name('admin.season.store');

        Route::put('/season/{season}', [SeasonController::class, 'update'])
            ->name('admin.season.update');

        Route::delete('/season/{season}', [SeasonController::class, 'destroy'])
            ->name('admin.season.delete');

        // Episodes
        Route::get('/episodes', [EpisodesController::class, 'index'])
            ->name('admin.episodes');

        Route::post('/episodes', [EpisodesController::class, 'store'])
            ->name('admin.episodes.store');

        Route::put('/episodes/{episode}', [EpisodesController::class, 'update'])
            ->name('admin.episodes.update');

        Route::delete('/episodes/{episode}', [EpisodesController::class, 'destroy'])
            ->name('admin.episodes.delete');

        // Homepage Section
        Route::get('/homepagesection', [HomepageSectionController::class, 'index'])
            ->name('admin.homepagesection');

        Route::post('/homepagesection', [HomepageSectionController::class, 'store'])
            ->name('admin.homepagesection.store');

        Route::put('/homepagesection/{homepagesection}', [HomepageSectionController::class, 'update'])
            ->name('admin.homepagesection.update');

        Route::delete('/homepagesection/{homepagesection}', [HomepageSectionController::class, 'destroy'])
            ->name('admin.homepagesection.delete');

        Route::post('/homepagesection/reorder', [HomepageSectionController::class, 'reorder'])
            ->name('admin.homepagesection.reorder');

        // Homepage Section -> Movies
        Route::get('/homepagesection/movies', [HomepageSectionController::class, 'movies'])
            ->name('admin.homepagesection.movies');

        Route::post('/homepagesection/movies/save', [HomepageSectionController::class, 'saveMovies'])
            ->name('admin.homepagesection.movies.save');

        // Ott
        Route::get('/ott', [OttController::class, 'index'])
            ->name('admin.ott');

        Route::post('/ott', [OttController::class, 'store'])
            ->name('admin.ott.store');

        Route::put('/ott/{ott}', [OttController::class, 'update'])
            ->name('admin.ott.update');

        Route::delete('/ott/{ott}', [OttController::class, 'destroy'])
            ->name('admin.ott.delete');

        // Cast - Roles
        Route::get('/castrole', [CastRoleController::class, 'index'])
            ->name('admin.castrole');

        Route::post('/castrole', [CastRoleController::class, 'store'])
            ->name('admin.castrole.store');

        Route::put('/castrole/{castrole}', [CastRoleController::class, 'update'])
            ->name('admin.castrole.update');

        Route::delete('/castrole/{castrole}', [CastRoleController::class, 'destroy'])
            ->name('admin.castrole.delete');

        // Cast
        Route::get('/cast', [CastController::class, 'index'])
            ->name('admin.cast');

        Route::post('/cast', [CastController::class, 'store'])
            ->name('admin.cast.store');

        Route::put('/cast/{cast}', [CastController::class, 'update'])
            ->name('admin.cast.update');

        Route::delete('/cast/{cast}', [CastController::class, 'destroy'])
            ->name('admin.cast.delete');

        // Cast - Content
        Route::get('/castcontent', [CastContentController::class, 'index'])
            ->name('admin.castcontent');

        Route::post('/castcontent', [CastContentController::class, 'store'])
            ->name('admin.castcontent.store');

        Route::put('/castcontent/{castContent}', [CastContentController::class, 'update'])
            ->name('admin.castcontent.update');

        Route::delete('/castcontent/{castContent}', [CastContentController::class, 'destroy'])
            ->name('admin.castcontent.destroy');

        // Genre
        Route::get('/genre', [GenreController::class, 'index'])
            ->name('admin.genre');

        Route::post('/genre', [GenreController::class, 'store'])
            ->name('admin.genre.store');

        Route::put('/genre/{genre}', [GenreController::class, 'update'])
            ->name('admin.genre.update');

        Route::delete('/genre/{genre}', [GenreController::class, 'destroy'])
            ->name('admin.genre.delete');

        // Users
        Route::get('/users', [UsersController::class, 'index'])
            ->name('admin.users');

        Route::post('/users', [UsersController::class, 'store'])
            ->name('admin.users.store');

        Route::put('/users/{users}', [UsersController::class, 'update'])
            ->name('admin.users.update');

        Route::delete('/users/{users}', [UsersController::class, 'destroy'])
            ->name('admin.users.delete');

    });

});
