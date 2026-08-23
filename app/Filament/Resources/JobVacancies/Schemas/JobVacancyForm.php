<?php

namespace App\Filament\Resources\JobVacancies\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class JobVacancyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Basic Information')
                    ->schema([
                        Select::make('industry_partner_id')
                            ->relationship('industryPartner', 'name')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->label('Industry Partner (Company)'),
                        TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, \Filament\Forms\Set $set) => $operation === 'create' ? $set('slug', Str::slug($state)) : null),
                        TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        TextInput::make('position')
                            ->required()
                            ->maxLength(255),
                    ])->columns(2),

                Section::make('Job Details')
                    ->schema([
                        RichEditor::make('description')
                            ->required()
                            ->columnSpanFull(),
                        RichEditor::make('requirements')
                            ->required()
                            ->columnSpanFull(),
                        RichEditor::make('responsibilities')
                            ->columnSpanFull(),
                    ]),

                Section::make('Work Information')
                    ->schema([
                        TextInput::make('location')
                            ->maxLength(255),
                        Select::make('work_type')
                            ->options([
                                'onsite' => 'Onsite',
                                'hybrid' => 'Hybrid',
                                'remote' => 'Remote',
                            ]),
                        Select::make('employment_type')
                            ->options([
                                'full_time' => 'Full Time',
                                'part_time' => 'Part Time',
                                'contract' => 'Contract',
                                'internship' => 'Internship',
                                'freelance' => 'Freelance',
                            ])
                            ->required()
                            ->default('full_time'),
                    ])->columns(3),

                Section::make('Compensation')
                    ->schema([
                        TextInput::make('salary_min')
                            ->numeric()
                            ->label('Minimum Salary'),
                        TextInput::make('salary_max')
                            ->numeric()
                            ->label('Maximum Salary'),
                        TextInput::make('salary_text')
                            ->maxLength(255)
                            ->label('Salary Text (e.g. Competitive, Negotiable)'),
                    ])->columns(3),

                Section::make('Application')
                    ->schema([
                        TextInput::make('application_url')
                            ->url()
                            ->maxLength(255)
                            ->label('Application URL'),
                        TextInput::make('application_email')
                            ->email()
                            ->maxLength(255)
                            ->label('Application Email'),
                        DatePicker::make('application_deadline')
                            ->label('Application Deadline'),
                    ])->columns(3),

                Section::make('Publishing')
                    ->schema([
                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                                'archived' => 'Archived',
                                'expired' => 'Expired',
                            ])
                            ->required()
                            ->default('draft'),
                        DateTimePicker::make('published_at')
                            ->label('Published At'),
                    ])->columns(2),

                Section::make('SEO')
                    ->schema([
                        TextInput::make('meta_title')
                            ->maxLength(255),
                        Textarea::make('meta_description')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
