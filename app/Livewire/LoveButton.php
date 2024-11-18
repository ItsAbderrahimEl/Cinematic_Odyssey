<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;

class LoveButton extends Component
{
    public int $element_id;
    public string $type;
    public bool $is_favorite;

    public function mount(int $element_id, string $type): void
    {
        $this->element_id = $element_id;
        $this->type = $type;
        $this->is_favorite = self::is_favorite($element_id);
    }

    public function render(): View
    {
        return view('livewire.love-button');
    }

    protected function is_favorite($id): bool
    {
        return Auth::user()
            ->personalLibrary()
            ->where('element_id', $id)
            ->where('type', $this->type)
            ->exists();
    }

    public function onClick(): void
    {
        if($this->is_favorite($this->element_id))
        {
            Auth::user()
                ->personalLibrary()
                ->where('element_id', $this->element_id)
                ->where('type', $this->type)
                ->delete();
            $this->is_favorite = false;
        } else
        {
            Auth::user()->personalLibrary()->create([
                "element_id" => $this->element_id,
                "type"       => $this->type,
            ]);
            $this->is_favorite = true;
        }
    }
}
