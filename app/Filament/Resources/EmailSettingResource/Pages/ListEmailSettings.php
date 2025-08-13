<?php

namespace App\Filament\Resources\EmailSettingResource\Pages;

use App\Filament\Resources\EmailSettingResource;
use App\Models\EmailSetting;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ListEmailSettings extends ListRecords
{
    protected static string $resource = EmailSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('test_connection')
                ->label('Test Email Connection')
                ->icon('heroicon-m-paper-airplane')
                ->color('info')
                ->requiresConfirmation()
                ->modalHeading('Test Email Connection')
                ->modalDescription('This will send a test email to verify your current email configuration.')
                ->action(function () {
                    try {
                        // Refresh mail config
                        EmailSetting::refreshMailConfig();
                        
                        $fromAddress = EmailSetting::get('MAIL_FROM_ADDRESS');
                        $fromName = EmailSetting::get('MAIL_FROM_NAME', config('app.name'));
                        
                        if (!$fromAddress) {
                            throw new \Exception('MAIL_FROM_ADDRESS is not configured');
                        }
                        
                        // Send test email
                        Mail::raw('This is a test email to verify your email configuration is working properly. Sent at: ' . now(), function ($message) use ($fromAddress, $fromName) {
                            $message->from($fromAddress, $fromName)
                                    ->to($fromAddress)
                                    ->subject('Email Configuration Test - ' . now()->format('Y-m-d H:i:s'));
                        });

                        Notification::make()
                            ->title('Test email sent successfully!')
                            ->body("Test email has been sent to {$fromAddress}")
                            ->success()
                            ->send();

                    } catch (\Exception $e) {
                        Log::error('Email configuration test failed: ' . $e->getMessage());
                        
                        Notification::make()
                            ->title('Email test failed')
                            ->body('Error: ' . $e->getMessage())
                            ->danger()
                            ->persistent()
                            ->send();
                    }
                }),
                
            Actions\Action::make('refresh_config')
                ->label('Refresh Configuration')
                ->icon('heroicon-m-arrow-path')
                ->color('warning')
                ->action(function () {
                    EmailSetting::refreshMailConfig();
                    
                    Notification::make()
                        ->title('Email configuration refreshed')
                        ->success()
                        ->send();
                }),
                
            Actions\CreateAction::make(),
        ];
    }
}