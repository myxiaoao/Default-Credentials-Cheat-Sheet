<?php

namespace App\Livewire;

use App\Models\Credential;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Livewire\Component;

class ListCredential extends Component implements HasForms, HasTable
{
    use InteractsWithForms, InteractsWithTable;

    public function table(Table $table): Table
    {
        return $table
            ->query(Credential::query())
            ->columns([
                Tables\Columns\TextColumn::make('product_vendor')
                    ->label(_('Product Vendor'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('username')
                    ->label(_('Username'))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('password')
                    ->label(_('Password'))
                    ->searchable()
                    ->sortable(),
            ]);
    }

    public function render()
    {
        return view('livewire.list-credential');
    }
}
