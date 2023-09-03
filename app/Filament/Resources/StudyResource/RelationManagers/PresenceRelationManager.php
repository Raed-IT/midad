<?php

namespace App\Filament\Resources\StudyResource\RelationManagers;

use App\Enums\GenderEnum;
use App\Enums\UserTypeEnum;
use App\Models\User;
use Faker\Provider\Text;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Model;

class PresenceRelationManager extends RelationManager
{
    protected static string $relationship = 'presence';
    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('words.presence');
    }

    public static function getModelLabel(): ?string
    {
        return __('words.presence');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute("name")
            ->columns([
                Tables\Columns\TextColumn::make("id")->label("ID")->sortable(),
                Tables\Columns\TextColumn::make("name")->label(__('words.name'))->searchable(),
                Tables\Columns\ToggleColumn::make("status")->label(__('words.presence')),
                Tables\Columns\TextColumn::make("email")->label(__('words.email'))->searchable(),
                Tables\Columns\TextColumn::make("roles")
                    ->badge()->color(fn($state) => UserTypeEnum::tryFrom($state->name)->color())
                    ->formatStateUsing(fn($state) => UserTypeEnum::tryFrom($state->name)->name())
                    ->label(__('words.user_type'))->searchable(),
                Tables\Columns\TextColumn::make("gender")
                    ->badge()->color(fn($state) => GenderEnum::tryFrom($state)->color())
                    ->formatStateUsing(fn($state) => GenderEnum::tryFrom($state)->name())
                    ->label(__('words.gender'))->searchable(),
            ])
            ->filters([
                //
            ])

            ->actions([
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\AttachAction::make()->preloadRecordSelect(),
            ]);
    }
}
