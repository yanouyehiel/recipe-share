<?php

namespace App\Livewire\Recette;

use App\Models\Etape;
use App\Models\Ingredient;
use App\Models\Recette;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Actions\Action;
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
use Filament\Forms\Components\HasManyRepeater;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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
    public string|array|object $image = [];
    public array|null|string $video;
    public Recette $recette;
    public int|null $recetteId;
    public $etapes;
    public string|null $descTache = null;
    public string $nbCalories;
    public string $nbPersonnes;
    public string $difficulte;
    public $ingredients;
    public string $pathimage;

    public function mount(Recette $recette): Form
    {
        $this->nom = $recette->nom;
        $this->description = $recette->description;
        $this->preparationTime = $recette->preparationTime;
        $this->cookingTime = $recette->cookingTime;
        $this->created_at = $recette->created_at;
        $this->updated_at = $recette->updated_at;
        array_push($this->image, $recette->image);
        $this->video[] = $recette->video;
        $this->recette = $recette;
        $this->recetteId = $recette->id;
        $this->nbCalories = $recette->nbCalories;
        $this->difficulte = $recette->difficulte;
        $this->nbPersonnes = $recette->nbPersonnes;
        
        $this->etapes = $recette->etapes()->get();
        $this->ingredients = $recette->ingredients()->get();

        return $this->form
            ->fill([
                'ingredients' => $this->ingredients->map(function ($ingredient) {
                    return [
                        'nom' => $ingredient->nom,
                        'calorie' => $ingredient->calorie,
                    ];
                })->toArray(),
                'etapes' => $this->etapes->map(function ($etape) {
                    return [
                        'description' => $etape->description
                    ];
                })->toArray()
            ]);
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
                            ->disk('public')
                            ->directory('uploads/images')
                            ->default($this->recette->image)
                            ->afterStateUpdated(
                                function ($state, $set, $get, $model) {
                                    $this->pathimage = $state->store('uploads/images');
                                }
                            ),
                        TextInput::make('video')
                            ->label("Insérer le lien de la vidéo tuto")
                            ->nullable(),
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
                MarkdownEditor::make('description'),
                Section::make("Résume")
                    ->schema([
                        TextInput::make('nbCalories')
                            ->label("Nombre de calories")
                            ->hint("En kcal")
                            ->hintColor('primary'),
                        TextInput::make('difficulte')
                            ->label("Difficulté"),
                        TextInput::make('nbPersonnes')
                            ->label('Nombre de personnes')
                    ])->columns(3),
                Section::make("Date")
                    ->description("")
                    ->schema([
                        DateTimePicker::make('created_at')->label("Date de création")->disabled(),
                        DateTimePicker::make('updated_at')->label("Date de mise à jour")->disabled(),
                    ])->columns(2),
                Section::make("Les étapes")
                    ->description("Ci-dessous les différentes étapes de préparation de cette recette")
                    ->schema([
                        Repeater::make("etapes")
                            ->schema([
                                Textarea::make('description')->required()
                            ])
                            ->cloneable()
                            ->reorderableWithButtons()
                            ->addActionLabel('Ajouter une étape')
                            ->orderColumn('sort')
                            ->statePath('etapes')
                        ]),
                Section::make("Les ingredients")
                    ->description("Ci-dessous les différentes étapes de préparation de cette recette")
                    ->schema([
                        Repeater::make("ingredients")
                            ->schema([
                                TextInput::make('nom')->required(),
                                TextInput::make('calorie')->nullable(),
                            ])
                            ->defaultItems(3)
                            ->columns(2)
                            ->cloneable()
                            ->reorderableWithButtons()
                            ->addActionLabel('Ajouter un ingredient')
                        
                    ])
            ]);
    }

    public function submit(Request $request)
    {
        $this->validate();
        
        $this->recette->update([
            'nom' => $this->nom,
            'description' => $this->description,
            'preparationTime' => $this->preparationTime,
            'cookingTime' => $this->cookingTime,
            'image' => $this->pathimage,
            'nbPersonnes' => $this->nbPersonnes,
            'nbCalories' => $this->nbCalories,
            'difficulte' => $this->difficulte
        ]);
        
        foreach ($this->etapes as $key => $etape) {
            Etape::create([
                'recette_id' => $this->recette->id,
                'description' => $etape[$key]["description"]
            ]);
        }

        foreach ($this->ingredients as $key => $ingredient) {
            Ingredient::create([
                'recette_id' => $this->recette->id,
                'nom' => $ingredient[$key]["nom"],
                'calorie' => $ingredient[$key]["calorie"]
            ]);
        }

        Notification::make()
            ->title('Recette')
            ->body('La recette a été mise à jour avec succès')
            ->success()
            ->send();
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
