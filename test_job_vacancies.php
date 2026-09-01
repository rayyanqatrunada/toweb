<?php
require __DIR__.'/vendor/autoload.php';

use App\Filament\Resources\JobVacancies\Tables\JobVacanciesTable;
use Filament\Tables\Table;

// This would crash if the action class was missing or incompatible
try {
    // We can't really instantiate Table without Livewire component context easily
    // Let's just check the return type of Filament\Actions\EditAction::make()
    $action = \Filament\Actions\EditAction::make();
    var_dump(get_class($action));
    var_dump($action instanceof \Filament\Tables\Actions\Action);
} catch (\Throwable $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
