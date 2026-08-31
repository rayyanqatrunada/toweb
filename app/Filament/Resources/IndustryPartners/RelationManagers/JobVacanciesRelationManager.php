<?php

namespace App\Filament\Resources\IndustryPartners\RelationManagers;

use App\Filament\Resources\JobVacancies\Schemas\JobVacancyForm;
use App\Filament\Resources\JobVacancies\Tables\JobVacanciesTable;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;

class JobVacanciesRelationManager extends RelationManager
{
    protected static string $relationship = 'jobVacancies';

    protected static ?string $recordTitleAttribute = 'title';

    protected static ?string $title = 'Lowongan Kerja';

    public function form(Schema $schema): Schema
    {
        // Use the same form schema, but we should remove the industry_partner_id field since it's implicit
        $configuredSchema = JobVacancyForm::configure($schema);
        
        // Remove the industry_partner_id field
        $components = $configuredSchema->getComponents();
        if (isset($components[0]) && method_exists($components[0], 'getChildComponents')) {
            $basicInfoComponents = $components[0]->getChildComponents();
            $filteredBasicInfo = array_filter($basicInfoComponents, function($component) {
                return $component->getName() !== 'industry_partner_id';
            });
            $components[0]->schema($filteredBasicInfo);
        }
        
        return $configuredSchema->components($components);
    }

    public function table(Table $table): Table
    {
        return JobVacanciesTable::configure($table)
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
            ]);
    }
}
