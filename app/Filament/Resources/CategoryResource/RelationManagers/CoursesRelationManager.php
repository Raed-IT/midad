<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use App\Models\Lang;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CoursesRelationManager extends RelationManager
{
    protected static string $relationship = 'courses';
    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('headers.courses');
    }

    public static function getModelLabel(): ?string
    {
        return __('headers.course');
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
                                                Forms\Components\TextInput::make("title." . $lang->code)->label(__("words.title"))->required(),
                                                Forms\Components\Textarea::make("description." . $lang->code)->label(__("words.description"))->required(),
                                            ]),
                                    );
                                }
                                return $items;
                            }
                        ),
                    SpatieMediaLibraryFileUpload::make('image')->collection('image')->label(__("words.image")),
                    Forms\Components\TextInput::make("duration")->label(__("words.duration"))->numeric()->required(),
                    Forms\Components\TextInput::make("price")->label(__("words.price"))->numeric()->required(),

                ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make("title")->sortable()->label(__('words.title'))->searchable(),

                Tables\Columns\TextColumn::make('studies_count')->counts('studies')
                    ->badge()->color("danger")->label(__('headers.studies')),
                Tables\Columns\TextColumn::make("category.name")->sortable()
                    ->badge()->label(__('words.category'))->searchable(),
                Tables\Columns\TextColumn::make("price")->sortable()->label(__('words.price')),
                Tables\Columns\TextColumn::make("duration")->sortable()->label(__('words.duration')),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
//                Tables\Actions\DeleteAction::make(),
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
