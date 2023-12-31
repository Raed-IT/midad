<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudyResource\Pages;
use App\Filament\Resources\StudyResource\RelationManagers\PresenceRelationManager;
use App\Filament\Resources\StudyResource\RelationManagers\TasksRelationManager;
use App\Models\Course;
use Filament\Forms\Components\Select;
use App\Models\Lang;
use App\Models\Study;
use Filament\Forms;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class StudyResource extends Resource
{
    protected static ?string $model = Study::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function getLabel(): ?string
    {
        return __('headers.study'); // TODO: Change the autogenerated stub
    }

    public static function getModelLabel(): string
    {
        return __('headers.study'); // TODO: Change the autogenerated stub
    }

    public static function getPluralLabel(): ?string
    {
        return __('headers.studies'); // TODO: Change the autogenerated stub
    }

    public static function getPluralModelLabel(): string
    {
        return __('headers.studies'); // TODO: Change the autogenerated stub
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
                                                Forms\Components\TextInput::make("title." . $lang->code)->required()->label(__('words.title')),
                                                Forms\Components\Textarea::make("description." . $lang->code)->required()->label(__('words.description')),
                                            ]),
                                    );
                                }
                                return $items;
                            }
                        ),
                    Select::make('course_id')
                        ->relationship("course", "title")
                        ->getOptionLabelFromRecordUsing(fn(Course $record) => $record->title)
                        ->preload()->label(__('headers.course')),

                    Select::make('user_id')
                        ->relationship("user", "name")
                        ->preload()->label(__('headers.teacher')),
                    Forms\Components\DateTimePicker::make("start_at")->required()->label(__("words.start_date")),
                    Forms\Components\DateTimePicker::make("end_at")->required()->label(__("words.end_date")),
                    SpatieMediaLibraryFileUpload::make('files')->label(__("words.files"))->multiple(),
                    SpatieMediaLibraryFileUpload::make('video')->collection('video')
                        ->acceptedFileTypes(["video/mp4", "application/x-mpegUR", "video/MP2T", "video/3gpp", "video/quicktime", "video/x-msvideo", "video/x-ms-wmv"])
                        ->label(__("words.video")),
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make("title")->label(__('words.title'))->limit(50),
                Tables\Columns\TextColumn::make('created_at')->formatStateUsing(
                    function ($record) {
                        return $record->presence()->whereStatus(true)->count();
                    }
                )->badge()->color("danger")->label(__('words.presence')),
                Tables\Columns\TextColumn::make('tasks_count')->counts('tasks')->badge()->color("success")->label(__('headers.tasks')),
                Tables\Columns\TextColumn::make("user.name")->label(__('headers.teacher')),
                Tables\Columns\TextColumn::make("course.title")->badge()->label(__('headers.course')),
                Tables\Columns\TextColumn::make("start_at")->label(__('words.start_date')),
                Tables\Columns\TextColumn::make("end_at")->label(__('words.end_date')),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
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
            PresenceRelationManager::class,
            TasksRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudies::route('/'),
            'create' => Pages\CreateStudy::route('/create'),
            'edit' => Pages\EditStudy::route('/{record}/edit'),
        ];
    }
}
