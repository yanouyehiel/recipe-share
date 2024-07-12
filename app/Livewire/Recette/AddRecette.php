<?php

namespace App\Livewire\Recette;

use App\Models\Recette;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Livewire\Component;

class AddRecette extends Component implements HasForms
{
    use InteractsWithForms;

    public string|null $nom = null;
    public string|null $description = null;
    public string|int $preparationTime;
    public string|int $cookingTime;
    public array|null|object|string $image = [];
    public array|null|string|object $video = [];
    public ?\Illuminate\Support\Collection $etapes = null;
    public string $nbCalories;
    public string $nbPersonnes;
    public string $difficulte;
    public string $filename;
    public string $filenameVideo;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("Présentation")
                    ->schema([
                        FileUpload::make('image')
                            ->label("Insérer l'image")
                            ->disk('local')
                            ->image()
                            ->directory('uploads/images')
                            ->reactive()
                            ->afterStateUpdated(function ($state, $set, $get, $model) {
                                $this->filename = $state->store('uploads/images');
                            }),
                        FileUpload::make('video')
                            ->label("Insérer le lien de la vidéo")
                            ->nullable()
                            ->afterStateUpdated(function ($state, $set, $get, $model) {
                                $this->filenameVideo = $state->getClientOriginalName();
                            }),
                    ])->columns(2),
                Section::make("")
                    ->schema([
                        TextInput::make('nom')
                            ->required(),
                        Textarea::make('description')
                            ->required()
                            ->rows(3),
                    ])->columns(2),
                Section::make("Timing")
                    ->description("Les différents timings pour votre reccette")
                    ->schema([
                        TextInput::make('preparationTime')
                            ->label('Temps de préparation')
                            ->hint("En min")
                            ->hintColor('primary'),
                        TextInput::make('cookingTime')
                            ->label("Temps de cuisson")
                            ->hint("En min")
                            ->hintColor('primary'),
                    ])->columns(2),
                Section::make()
                    ->schema([
                        TextInput::make('nbCalories')
                            ->label('Nombre de calories')
                            ->hint('en kcal')
                            ->hintColor('primary'),
                        TextInput::make('nbPersonnes')
                            ->label("Nombre de personnes"),
                        Select::make('difficulte')
                            ->options([
                                'facile' => 'Facile',
                                'moyen' => 'Moyen',
                                'difficile' => 'Difficile'
                            ])
                    ])->columns(3)
            ]);
    }

    public function submit()
    {
        $this->validate();
        
        $recette = new Recette();
        $recette->nom = $this->nom;
        $recette->description = $this->description;
        $recette->image = $this->filename;
        $recette->video = $this->filenameVideo != "" ? $this->filenameVideo : "";
        $recette->difficulte = $this->difficulte;
        $recette->nbPersonnes = (int) $this->nbPersonnes;
        $recette->nbCalories = (int) $this->nbCalories;
        $recette->preparationTime = (int) $this->preparationTime;
        $recette->cookingTime = (int) $this->cookingTime;
        $recette->user_id = auth()->user()->id;
        $recette->save();

        Notification::make('alerte')
            ->title('Recette')
            ->body('La recette a été enregistrée avec succès')
            ->success()
            ->send();
    }

    public function render()
    {
        return view('livewire.recette.add-recette');
    }
}
