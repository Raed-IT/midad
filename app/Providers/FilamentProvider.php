<?php

namespace App\Providers;

use Althinect\FilamentSpatieRolesPermissions\Resources\RoleResource;
use App\Enums\UserTypeEnum;
use App\Filament\Resources\UserResource;
use Filament\Facades\Filament;
use Filament\Navigation\UserMenuItem;
use Illuminate\Support\ServiceProvider;

class FilamentProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Filament::serving(function () {
            if (auth()?->user()?->hasRole(UserTypeEnum::SUPERVISOR->value)) {
                Filament::registerUserMenuItems(
                    [UserMenuItem::make()
                        ->label(__('headers.users'))
                        ->url(UserResource::getUrl())
                        ->icon("heroicon-s-users"),
                        UserMenuItem::make()
                            ->label(__('headers.roles'))
                            ->url(RoleResource::getUrl())
                            ->icon("heroicon-s-cog"),
                    ]
                );
            }
        });
    }
}
