<?php

namespace App\Filament\Resources\TaskResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnswerRelationManager extends RelationManager
{
    protected static string $relationship = 'answers';

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('headers.answers');
    }

    public static function getModelLabel(): ?string
    {
        return __('headers.answer');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Forms\Components\Select::make("user_id")
                        ->relationship("user", "name")->label(__('headers.user'))->required(),
                    Forms\Components\Textarea::make("info")->label(__('words.description')),
                    Forms\Components\SpatieMediaLibraryFileUpload::make("files")->label(__("words.files"))
                ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('info')
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->badge()->color("success")->label(__("headers.student")),
                Tables\Columns\TextColumn::make('info')->label(__("words.description")),
            ])
            ->filters([
                //
            ])
            ->headerActions([
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
            ])
            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
            ]);
    }
}
