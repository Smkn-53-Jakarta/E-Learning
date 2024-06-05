<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Route;

class RoutingHelper
{
    // hanya bisa di gunakan ketika posisi di index route
    public static function generateCreateRoute(): String
    {
        return route(str_replace('index', 'create', Route::currentRouteName()));
    }

    // hanya bisa di gunakan ketika posisi di index route
    public static function generateDetailRoute($id): String
    {
        return route(str_replace('index', 'show', Route::currentRouteName()), $id);
    }

    // hanya bisa di gunakan ketika posisi di index route
    public static function generateEditRoute($id): String
    {
        return route(str_replace('index', 'edit', Route::currentRouteName()), $id);
    }

    // hanya bisa di gunakan ketika posisi di index route
    public static function generateDeleteRoute($id): String
    {
        return route(str_replace('index', 'destroy', Route::currentRouteName()), $id);
    }

    public static function createToIndexRoute($parameter = null)
    {
        $indexRouteName = str_replace('create', 'index', Route::currentRouteName());

        return $parameter ? route($indexRouteName, $parameter) : route($indexRouteName);
    }

    public static function editToIndexRoute($parameter = null)
    {
        $indexRouteName = str_replace('edit', 'index', Route::currentRouteName());

        return $parameter ? route($indexRouteName, $parameter) : route($indexRouteName);
    }

    public static function createToStoreRoute()
    {
        return route(str_replace('create', 'store', Route::currentRouteName()));
    }

    public static function storeToCreateRoute()
    {
        return route(str_replace('store', 'create', Route::currentRouteName()));
    }

    public static function storeToIndexRoute($parameter = null)
    {
        $indexRouteName = str_replace('store', 'index', Route::currentRouteName());

        return $parameter ? route($indexRouteName, $parameter) : route($indexRouteName);
    }

    public static function editToUpdateRoute($id)
    {
        return route(str_replace('edit', 'update', Route::currentRouteName()), $id);
    }

    public static function updateToIndexRoute($parameter = null)
    {
        $indexRouteName = str_replace('update', 'index', Route::currentRouteName());

        return $parameter ? route($indexRouteName, $parameter) : route($indexRouteName);
    }

    public static function restoreToIndex()
    {
        return route(str_replace('restore', 'index', Route::currentRouteName()));
    }

    public static function forceDeleteToIndex()
    {
        return route(str_replace('force-delete', 'index', Route::currentRouteName()));
    }

    public static function copyToIndex()
    {
        return route(str_replace('copy', 'index', Route::currentRouteName()));
    }

    public static function generateToIndex()
    {
        return route(str_replace('generate', 'index', Route::currentRouteName()));
    }
}
