<?php

// File: app/Filament/Resources/InvoiceSettingResource/Pages/ManageInvoiceSettings.php

namespace App\Filament\Resources\InvoiceSettingResource\Pages;

use App\Filament\Resources\InvoiceSettingResource;
use App\Models\InvoiceSetting;
use Filament\Actions;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\Page;
use Illuminate\Support\Facades\DB;

class ManageInvoiceSettings extends Page
{
    protected static string $resource = InvoiceSettingResource::class;

    protected static string $view = 'filament.resources.invoice-setting-resource.pages.manage-invoice-settings';

    protected static ?string $title = 'Invoice Settings';

    protected static ?string $navigationLabel = 'Invoice Settings';

    public ?array $data = [];

    public function mount(): void
    {
        $this->loadSettings();
    }

    protected function loadSettings(): void
    {
        $settings = InvoiceSetting::all()->pluck('value', 'key')->toArray();
        
        // Convert boolean strings to actual booleans for form
        foreach ($settings as $key => $value) {
            $setting = InvoiceSetting::where('key', $key)->first();
            if ($setting && $setting->type === 'boolean') {
                $settings[$key] = $value === '1' || $value === 'true';
            }
        }

        $this->form->fill($settings);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                // Company Information Section
                Forms\Components\Section::make('Company Information')
                    ->description('Basic company details that appear on invoices')
                    ->icon('heroicon-o-building-office-2')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('company_name')
                                    ->label('Company Name')
                                    ->placeholder('Your Company Name')
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('company_email')
                                    ->label('Company Email')
                                    ->email()
                                    ->placeholder('info@company.com')
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('company_phone')
                                    ->label('Phone Number')
                                    ->placeholder('+1 (555) 123-4567')
                                    ->maxLength(255),

                                Forms\Components\TextInput::make('company_website')
                                    ->label('Website')
                                    ->url()
                                    ->placeholder('https://www.company.com')
                                    ->maxLength(255),
                            ]),

                        Forms\Components\Textarea::make('company_address')
                            ->label('Company Address')
                            ->placeholder("123 Business Street\nBusiness City, State 12345")
                            ->rows(3)
                            ->maxLength(500),

                        Forms\Components\FileUpload::make('company_logo')
                            // ->defaul
                            ->label('Company Logo')
                            ->directory('invoice-settings')
                            ->image()
                            // ->imageEditor()
                            // ->disk('public')
                            // ->visibility('public')
                            ->maxSize(2048)
                            ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/gif', 'image/webp'])
                            // ->default(fn () => \App\Models\InvoiceSetting::first()?->company_logo)
                            ->helperText('Upload your company logo (max 2MB)'),
                    ])
                    ->collapsible()
                    ->persistCollapsed(),

                // Invoice Configuration Section
                Forms\Components\Section::make('Invoice Configuration')
                    ->description('Configure invoice numbering and display settings')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                Forms\Components\TextInput::make('invoice_prefix')
                                    ->label('Invoice Prefix')
                                    ->placeholder('INV')
                                    ->maxLength(10),

                                Forms\Components\TextInput::make('invoice_number_length')
                                    ->label('Number Length')
                                    ->numeric()
                                    ->placeholder('6')
                                    ->minValue(1)
                                    ->maxValue(10)
                                    ->step(1),

                                // Forms\Components\Select::make('invoice_template')
                                //     ->label('Template Style')
                                //     ->options([
                                //         'default' => 'Default',
                                //         'modern' => 'Modern',
                                //         'classic' => 'Classic',
                                //         'minimal' => 'Minimal',
                                //     ])
                                //     ->default('default'),
                            ]),

                        // Forms\Components\Grid::make(2)
                        //     ->schema([
                        //         Forms\Components\Textarea::make('invoice_footer')
                        //             ->label('Invoice Footer')
                        //             ->placeholder('Thank you for your business!')
                        //             ->rows(2)
                        //             ->maxLength(500),

                        //         Forms\Components\Textarea::make('invoice_notes')
                        //             ->label('Default Notes')
                        //             ->placeholder('Please pay within the specified payment terms.')
                        //             ->rows(2)
                        //             ->maxLength(500),
                        //     ]),
                    ])
                    ->collapsible()
                    ->persistCollapsed(),

                // Currency & Tax Section
                // Forms\Components\Section::make('Currency & Tax Settings')
                //     ->description('Configure currency display and tax calculations')
                //     ->icon('heroicon-o-currency-dollar')
                //     ->schema([
                //         Forms\Components\Grid::make(4)
                //             ->schema([
                //                 Forms\Components\TextInput::make('default_currency')
                //                     ->label('Currency Code')
                //                     ->placeholder('USD')
                //                     ->maxLength(3),
                //                     // ->uppercase(),

                //                 Forms\Components\TextInput::make('currency_symbol')
                //                     ->label('Currency Symbol')
                //                     ->placeholder('$')
                //                     ->maxLength(5),

                //                 Forms\Components\Select::make('currency_position')
                //                     ->label('Symbol Position')
                //                     ->options([
                //                         'before' => 'Before Amount ($100)',
                //                         'after' => 'After Amount (100$)',
                //                     ])
                //                     ->default('before'),

                //                 Forms\Components\TextInput::make('decimal_places')
                //                     ->label('Decimal Places')
                //                     ->numeric()
                //                     ->placeholder('2')
                //                     ->minValue(0)
                //                     ->maxValue(4)
                //                     ->step(1),
                //             ]),

                //         Forms\Components\Grid::make(3)
                //             ->schema([
                //                 Forms\Components\TextInput::make('default_tax_rate')
                //                     ->label('Default Tax Rate (%)')
                //                     ->numeric()
                //                     ->placeholder('10.00')
                //                     ->step(0.01)
                //                     ->minValue(0)
                //                     ->maxValue(100)
                //                     ->suffix('%'),

                //                 Forms\Components\TextInput::make('tax_name')
                //                     ->label('Tax Label')
                //                     ->placeholder('VAT')
                //                     ->maxLength(50),

                //                 Forms\Components\Toggle::make('include_tax')
                //                     ->label('Include Tax by Default')
                //                     ->onColor('success')
                //                     ->offColor('gray'),
                //             ]),
                //     ])
                //     ->collapsible()
                //     ->persistCollapsed(),

                // Payment Settings Section
                // Forms\Components\Section::make('Payment Settings')
                //     ->description('Configure payment terms and methods')
                //     ->icon('heroicon-o-credit-card')
                //     ->schema([
                //         Forms\Components\Grid::make(2)
                //             ->schema([
                //                 Forms\Components\TextInput::make('default_payment_terms')
                //                     ->label('Default Payment Terms (Days)')
                //                     ->numeric()
                //                     ->placeholder('30')
                //                     ->minValue(1)
                //                     ->maxValue(365)
                //                     ->step(1)
                //                     ->suffix('days'),

                //                 Forms\Components\Select::make('date_format')
                //                     ->label('Date Format')
                //                     ->options([
                //                         'Y-m-d' => '2024-12-31',
                //                         'd/m/Y' => '31/12/2024',
                //                         'm/d/Y' => '12/31/2024',
                //                         'd-M-Y' => '31-Dec-2024',
                //                         'F j, Y' => 'December 31, 2024',
                //                     ])
                //                     ->default('Y-m-d'),
                //             ]),

                //         Forms\Components\Textarea::make('payment_methods')
                //             ->label('Available Payment Methods (JSON)')
                //             ->placeholder('{"bank_transfer": "Bank Transfer", "credit_card": "Credit Card", "paypal": "PayPal"}')
                //             ->rows(4)
                //             ->helperText('Enter valid JSON format for payment methods')
                //             ->rules([
                //                 function () {
                //                     return function (string $attribute, $value, \Closure $fail) {
                //                         if (!empty($value)) {
                //                             json_decode($value);
                //                             if (json_last_error() !== JSON_ERROR_NONE) {
                //                                 $fail('Please enter valid JSON format.');
                //                             }
                //                         }
                //                     };
                //                 },
                //             ]),
                //     ])
                //     ->collapsible()
                //     ->persistCollapsed(),

                // Email Settings Section
                Forms\Components\Section::make('Email Settings')
                    ->description('Configure automatic email notifications')
                    ->icon('heroicon-o-envelope')
                    ->schema([
                        Forms\Components\Toggle::make('auto_send_invoice')
                            ->label('Auto Send Invoice Email')
                            ->helperText('Automatically send email when invoice is created')
                            ->onColor('success')
                            ->offColor('gray'),

                        Forms\Components\TextInput::make('email_subject_template')
                            ->label('Email Subject Template')
                            ->placeholder('Invoice #{invoice_number} from {company_name}')
                            ->maxLength(255)
                            ->helperText('Available variables: {invoice_number}, {company_name}, {client_name}'),

                        Forms\Components\Textarea::make('email_body_template')
                            ->label('Email Body Template')
                            ->placeholder("Dear {client_name},\n\nPlease find attached your invoice #{invoice_number}.\n\nThank you!")
                            ->rows(5)
                            ->maxLength(1000)
                            ->helperText('Available variables: {invoice_number}, {company_name}, {client_name}'),
                    ])
                    ->collapsible()
                    ->persistCollapsed(),

                // // Number Formatting Section
                // Forms\Components\Section::make('Number Formatting')
                //     ->description('Configure how numbers are displayed')
                //     ->icon('heroicon-o-calculator')
                //     ->schema([
                //         Forms\Components\Grid::make(2)
                //             ->schema([
                //                 Forms\Components\TextInput::make('thousand_separator')
                //                     ->label('Thousand Separator')
                //                     ->placeholder(',')
                //                     ->maxLength(1)
                //                     ->helperText('Example: 1,000'),

                //                 Forms\Components\TextInput::make('decimal_separator')
                //                     ->label('Decimal Separator')
                //                     ->placeholder('.')
                //                     ->maxLength(1)
                //                     ->helperText('Example: 10.50'),
                //             ]),
                //     ])
                //     ->collapsible()
                //     ->persistCollapsed(),
            ])
            ->statePath('data');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('save')
                ->label('Save Settings')
                ->color('primary')
                ->icon('heroicon-o-check')
                ->action('save'),

            Actions\Action::make('reset')
                ->label('Reset to Defaults')
                ->color('gray')
                ->icon('heroicon-o-arrow-path')
                ->requiresConfirmation()
                ->modalHeading('Reset Settings')
                ->modalDescription('This will reset all settings to their default values. Are you sure?')
                ->action('resetToDefaults'),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();

            DB::transaction(function () use ($data) {
                foreach ($data as $key => $value) {
                    // Determine the type based on the value
                    $type = $this->determineType($key, $value);
                    
                    // Convert boolean to string for storage
                    if ($type === 'boolean') {
                        $value = $value ? '1' : '0';
                    }
                    
                    // Format JSON
                    if ($type === 'json' && !empty($value)) {
                        $decoded = json_decode($value, true);
                        if ($decoded !== null) {
                            $value = json_encode($decoded);
                        }
                    }

                    InvoiceSetting::updateOrCreate(
                        ['key' => $key],
                        ['value' => $value, 'type' => $type]
                    );
                }
            });

            Notification::make()
                ->success()
                ->title('Settings Saved')
                ->body('Invoice settings have been updated successfully.')
                ->send();

        } catch (\Exception $e) {
            Notification::make()
                ->danger()
                ->title('Error')
                ->body('Failed to save settings: ' . $e->getMessage())
                ->send();
        }
    }

    public function resetToDefaults(): void
    {
        try {
            // You can call the seeder or define defaults here
            DB::table('invoice_settings')->truncate();
            
            // Re-run seeder logic or define defaults
            $this->runDefaultSettings();
            
            $this->loadSettings();

            Notification::make()
                ->success()
                ->title('Settings Reset')
                ->body('All settings have been reset to their default values.')
                ->send();

        } catch (\Exception $e) {
            Notification::make()
                ->danger()
                ->title('Error')
                ->body('Failed to reset settings: ' . $e->getMessage())
                ->send();
        }
    }

    private function determineType(string $key, $value): string
    {
        // Define type mappings based on field names
        $typeMapping = [
            'company_email' => 'email',
            'company_website' => 'url',
            'company_address' => 'textarea',
            'company_logo' => 'image',
            'invoice_footer' => 'textarea',
            'invoice_notes' => 'textarea',
            'email_body_template' => 'textarea',
            'payment_methods' => 'json',
            'auto_send_invoice' => 'boolean',
            'include_tax' => 'boolean',
            'default_tax_rate' => 'number',
            'invoice_number_length' => 'number',
            'default_payment_terms' => 'number',
            'decimal_places' => 'number',
        ];

        return $typeMapping[$key] ?? 'text';
    }

    private function runDefaultSettings(): void
    {
        // Add your default settings here - same as in seeder
        $defaults = [
            'company_name' => 'Your Company Name',
            'company_email' => 'info@company.com',
            'company_phone' => '+1 (555) 123-4567',
            'company_website' => 'https://www.company.com',
            'company_address' => "123 Business Street\nBusiness City, State 12345",
            'invoice_prefix' => 'INV',
            'invoice_number_length' => '6',
            'default_currency' => 'USD',
            'currency_symbol' => '$',
            'currency_position' => 'before',
            'default_tax_rate' => '10.00',
            'tax_name' => 'VAT',
            'include_tax' => '1',
            'default_payment_terms' => '30',
            'payment_methods' => json_encode([
                'bank_transfer' => 'Bank Transfer',
                'credit_card' => 'Credit Card',
                'paypal' => 'PayPal',
                'cash' => 'Cash'
            ]),
            'invoice_template' => 'default',
            'invoice_footer' => 'Thank you for your business!',
            'invoice_notes' => 'Please pay within the specified payment terms.',
            'auto_send_invoice' => '0',
            'email_subject_template' => 'Invoice #{invoice_number} from {company_name}',
            'email_body_template' => "Dear {client_name},\n\nPlease find attached your invoice #{invoice_number}.\n\nThank you for your business!\n\nBest regards,\n{company_name}",
            'date_format' => 'Y-m-d',
            'decimal_places' => '2',
            'thousand_separator' => ',',
            'decimal_separator' => '.',
        ];

        foreach ($defaults as $key => $value) {
            $type = $this->determineType($key, $value);
            InvoiceSetting::create([
                'key' => $key,
                'value' => $value,
                'type' => $type
            ]);
        }
    }
}