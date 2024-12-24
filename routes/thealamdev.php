<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EventFAQController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\EventAgendaController;
use App\Http\Controllers\Admin\EventScheduleController;

Route::prefix('events')->name('event.')->group(function () {
    Route::controller(EventController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::post('store', 'store')->name('store');
        Route::put('update/{event}', 'update')->name('update');
        Route::delete('delete/{event}', 'delete')->name('delete/{event}');
    });

    Route::prefix('{event}')->group(function () {
        Route::prefix('schedules')->name('schedule.')->group(function () {
            Route::controller(EventScheduleController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::put('update/{event}', 'update')->name('update');
                Route::delete('delete/{event}', 'delete')->name('delete/{event}');
            });
        });

        Route::prefix('agendas')->name('agenda.')->group(function () {
            Route::controller(EventAgendaController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::put('update/{agenda}', 'update')->name('update');
                Route::delete('delete/{agenda}', 'delete')->name('delete/{event}');
            });
        });

        Route::prefix('faqs')->name('faq.')->group(function () {
            Route::controller(EventFAQController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('create', 'create')->name('create');
                Route::post('store', 'store')->name('store');
                Route::put('update/{faq}', 'update')->name('update');
                Route::delete('delete/{faq}', 'delete')->name('delete/{event}');
            });
        });
    });
});

Route::middleware(['auth', 'locale'])->prefix('dashboard')->group(function () {
    Route::controller(AdminUserController::class)->prefix('user')->name('user.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::get('edit/{user}', 'edit')->name('edit');
        Route::delete('delete/{user}', 'destroy')->name('delete');
    });

    Route::controller(CategoryController::class)->prefix('category')->name('category.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('create', 'create')->name('create');
        Route::get('edit/{category}', 'edit')->name('edit');
        Route::delete('delete/{category}', 'destroy')->name('delete');
    });
});
