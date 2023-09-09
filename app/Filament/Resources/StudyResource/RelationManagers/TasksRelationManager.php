<?php

namespace App\Filament\Resources\StudyResource\RelationManagers;

use App\Models\Lang;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class TasksRelationManager extends RelationManager
{
    protected static string $relationship = 'tasks';

    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('headers.tasks');
    }

    public static function getModelLabel(): ?string
    {
        return __('headers.task');
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()->schema([
                    Tabs::make('Label')
                        ->tabs(
                            function () {
                                $items = [];
                                foreach (Lang::whereIsActive(true)->get() as $lang) {
                                    array_push($items,
                                        Tabs\Tab::make($lang->name)
                                            ->schema([
                                                Forms\Components\Textarea::make("info." . $lang->code)->label(__('words.description')),]),
                                    );
                                }
                                return $items;
                            }
                        ),
                    Forms\Components\Select::make('user_id')->relationship("user","name")->label(__("headers.user")),
                    SpatieMediaLibraryFileUpload::make('image')->collection('image')->label(__("words.files")),
                    SpatieMediaLibraryFileUpload::make('video')->collection('video')->label(__("words.video")),

                ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('user.name')
            ->columns([
                 Tables\Columns\TextColumn::make('user.name')->label(__("headers.user")),
                 Tables\Columns\TextColumn::make('info')->label(__("words.description")),
                Tables\Columns\TextColumn::make('created_at')->label(__("words.date")),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),

            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make(),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
