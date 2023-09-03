<?php

namespace App\Filament\Resources\CourseResource\RelationManagers;

use App\Models\Course;
use App\Models\Lang;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudiesRelationManager extends RelationManager
{
    protected static string $relationship = 'studies';
    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __('headers.studies');
    }

    public static function getModelLabel(): ?string
    {
        return __('headers.study');
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
                    SpatieMediaLibraryFileUpload::make('image')->label(__("words.files"))->multiple(),
                    SpatieMediaLibraryFileUpload::make('video')->collection('video')
                        ->acceptedFileTypes(["application/video"])
                        ->label(__("words.video")),
                ])
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
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
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
