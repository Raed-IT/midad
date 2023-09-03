<?php

namespace App\Filament\Resources\CourseResource\RelationManagers;

use App\Enums\GenderEnum;
use App\Enums\UserTypeEnum;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UsersRelationManager extends RelationManager
{
    protected static string $relationship = 'users';
    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('headers.students');
    }

    public static function getModelLabel(): ?string
    {
        return __('headers.student');
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make("id")->label("ID")->sortable(),
                Tables\Columns\TextColumn::make("name")->label(__('words.name'))->searchable(),
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
            ->headerActions([
                Tables\Actions\AttachAction::make()->preloadRecordSelect()->label(__("words.attach_student")),
            ])
            ->actions([
                Tables\Actions\DetachAction::make()->button()->label(__('words.detach_student')),
            ])
            ->emptyStateActions([
                Tables\Actions\AttachAction::make()->preloadRecordSelect()->label(__("words.attach_student")),
            ]);
    }
}
