<?php

namespace App\Livewire\Recette;

use App\Models\Commentaire;
use App\Models\Recette;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Illuminate\Support\Arr;
use Livewire\Component;

class AddComment extends Component implements HasForms
{
    use InteractsWithForms;

    public Recette $recette;
    public string $text;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("Ajouter un commentaire")
                    ->schema([
                        TextInput::make('text')
                            ->required()
                            ->label('Votre commentaire')
                    ])
            ]);
    }

    public function render()
    {
        return view('livewire.recette.add-comment');
    }

    public function submit()
    {
        $comment = new Commentaire();
        $comment->create([
            'comment' => $this->text,
            'recette_id' => $this->recette->id,
            'user_id' => auth()->user()->id
        ]);
    }
}
