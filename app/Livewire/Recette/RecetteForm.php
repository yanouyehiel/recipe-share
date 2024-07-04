<?php

namespace App\Livewire\Recette;

use App\Models\Etape;
use App\Models\Recette;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Livewire\Component;
use Filament\Forms\Form;
use Illuminate\Support\Str;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;

class RecetteForm extends Component implements HasForms
{
    use InteractsWithForms;
    /**
     * @var Etape[]
     */

    public string|null $nom = null;
    public string|null $description = null;
    public string|int $preparationTime;
    public string|int $cookingTime;
    public string $created_at;
    public string $updated_at;
    public string|null $image;
    public string|null $video;
    public Recette $recette;
    public int|null $recetteId;
    public $etapes;
    public string|null $descTache = null;

    public function mount(Recette $recette): void
    {
        $this->nom = $recette->nom;
        $this->description = $recette->description;
        $this->preparationTime = $recette->preparationTime;
        $this->cookingTime = $recette->cookingTime;
        $this->created_at = $recette->created_at;
        $this->updated_at = $recette->updated_at;
        $this->image = $recette->image;
        $this->video = $recette->video;
        $this->recette = $recette;
        $this->recetteId = $recette->id;

        $this->etapes = $recette->etapes()->get();
    }
 
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nom'),
                Section::make("Présentation")
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->imageEditor(),
                        FileUpload::make('video'),
                            //->image()
                            //->imageEditor(),
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
                RichEditor::make('description'),
                //Textarea::make('description'),
                DateTimePicker::make('created_at')->label("Date de création")->disabled(),
                DateTimePicker::make('updated_at')->label("Date de mise à jour")->disabled(),
                Section::make("Les étapes")
                    ->description("Ci-dessous les différentes étapes de préparation de cette recette")
                    ->schema([
                        Repeater::make("etapes")
                            ->schema([
                                Textarea::make('description')->label('Etape')
                            ])
                            //->reorderable(true)
                            //->collapsible()
                            ->cloneable()
                            ->reorderableWithButtons()
                            ->addActionLabel('Ajouter une tâche')
                            ->orderColumn('sort')
                    ])
            ]);
    }

    public function submit()
    {
        $this->validate();

        Recette::query()
            ->whereId($this->recetteId)
            ->update([
                'nom' => $this->nom,
                'description' => $this->description,
                'preparationTime' => $this->preparationTime,
                'cookingTime' => $this->cookingTime
            ]);
    }

    public function rules(): array
    {
        return [
            'nom' => [
                'string',
                'required'
            ],
            'description' => [
                'string',
                'required'
            ],
            'preparationTime' => [
                'number',
                'required'
            ],
            'cookingTime' => [
                'number',
                'required'
            ]
        ];
    }

    public function render()
    {
        return view('livewire.recette.recette-form');
    }
}
