<?php

namespace App\Livewire\Recette;

use App\Models\Etape;
use App\Models\Recette;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Livewire\Component;

class TacheRecette extends Component implements HasForms
{
    use InteractsWithForms;

    public ?\Illuminate\Support\Collection $etapes = null;

    public function mount(Recette $recette)
    {
        $this->etapes = Etape::where('recette_id', $recette->id)->get();
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("Les étapes")
                    ->description("Ci-dessous les différentes étapes de préparation de cette recette")
                    ->schema([
                        Repeater::make("etapes")
                            ->schema([
                                Textarea::make('description')
                                    ->label('Etape')
                                    ->live(onBlur: true)
                            ])
                            ->cloneable()
                            ->reorderableWithButtons()
                            ->addActionLabel('Ajouter une étape')
                            ->orderColumn('sort')
                            ->statePath('etapes')
                        
                    ])
            ]);
    }

    public function render()
    {
        return view('livewire.recette.tache-recette');
    }
}
