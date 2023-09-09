<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers\CoursesRelationManager;
use App\Models\Category;
use App\Models\Lang;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Tabs;


class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    public static function getLabel(): ?string
    {
        return __('headers.category'); // TODO: Change the autogenerated stub
    }

    public static function getModelLabel(): string
    {
        return __('headers.category'); // TODO: Change the autogenerated stub
    }

    public static function getPluralLabel(): ?string
    {
        return __('headers.categories'); // TODO: Change the autogenerated stub
    }

    public static function getPluralModelLabel(): string
    {
        return __('headers.categories'); // TODO: Change the autogenerated stub
    }

    public static function form(Form $form): Form
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
                                                Forms\Components\TextInput::make("name." . $lang->code)->required()->label(__("words.name")),
                                            ]),
                                    );
                                }
                                return $items;
                            }
                        ),
                    Forms\Components\Toggle::make("is_active")->required()->label(__("words.status")),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("name")->label(__('words.name')),
                Tables\Columns\ToggleColumn::make("is_active")->label(__('words.status'))
            ])
            ->filters([
                //
            ])
            ->actions([
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

    public static function getRelations(): array
    {
        return [
            CoursesRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
