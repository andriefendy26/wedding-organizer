{{-- File: resources/views/filament/resources/invoice-setting-resource/pages/manage-invoice-settings.blade.php --}}

<x-filament-panels::page>
    <div class="space-y-6">
        {{-- Header dengan description --}}
        <div class="pb-4 text-center border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-center mb-2 space-x-2">
                <x-heroicon-o-cog-6-tooth class="w-6 h-6 text-primary-600" />
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Invoice Settings</h1>
            </div>
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Configure your invoice settings, company information, and preferences all in one place.
            </p>
        </div>

        {{-- Settings Form --}}
        <div class="max-w-4xl mx-auto">
            <form wire:submit="save">
                {{ $this->form }}
                
                {{-- Action Buttons - Fixed at bottom --}}
                <div class="sticky bottom-0 pt-4 mt-8 bg-white border-t border-gray-200 dark:bg-gray-900 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            <x-heroicon-o-information-circle class="inline w-4 h-4 mr-1" />
                            Changes will be saved automatically when you click "Save Settings"
                        </div>
                        
                        <div class="flex space-x-3">
                            <x-filament::button
                                color="gray"
                                outlined
                                wire:click="resetToDefaults"
                                wire:confirm="This will reset all settings to their default values. Are you sure?"
                                icon="heroicon-o-arrow-path"
                            >
                                Reset to Defaults
                            </x-filament::button>
                            
                            <x-filament::button
                                type="submit"
                                color="primary"
                                icon="heroicon-o-check"
                            >
                                Save Settings
                            </x-filament::button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Loading indicator --}}
    <div wire:loading.flex class="fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-50">
        <div class="flex items-center p-6 space-x-3 bg-white rounded-lg dark:bg-gray-800">
            <x-filament::loading-indicator class="w-5 h-5" />
            <span class="text-sm font-medium text-gray-900 dark:text-white">Saving settings...</span>
        </div>
    </div>

    {{-- Custom styles for better UX --}}
    <style>
        /* Smooth transitions */
        .fi-section {
            transition: all 0.3s ease;
        }
        
        /* Better spacing for form sections */
        .fi-section .fi-section-content {
            @apply space-y-4;
        }
        
        /* Custom scrollbar for better UX */
        .fi-main::-webkit-scrollbar {
            width: 6px;
        }
        
        .fi-main::-webkit-scrollbar-track {
            @apply bg-gray-100 dark:bg-gray-800;
        }
        
        .fi-main::-webkit-scrollbar-thumb {
            @apply bg-gray-300 dark:bg-gray-600 rounded-full;
        }
        
        .fi-main::-webkit-scrollbar-thumb:hover {
            @apply bg-gray-400 dark:bg-gray-500;
        }

        /* Better focus states */
        .fi-input:focus,
        .fi-select select:focus,
        .fi-textarea:focus {
            @apply ring-2 ring-primary-500 ring-offset-2 dark:ring-offset-gray-900;
        }

        /* Section header styling */
        .fi-section-header {
            @apply border-b border-gray-100 dark:border-gray-800 pb-3 mb-4;
        }

        /* Toggle switch enhancements */
        .fi-toggle {
            transition: all 0.2s ease;
        }

        /* File upload area improvements */
        .fi-fo-file-upload {
            @apply border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg p-6;
        }
        
        .fi-fo-file-upload:hover {
            @apply border-primary-400 dark:border-primary-500 bg-primary-50 dark:bg-primary-950;
        }
    </style>

    {{-- JavaScript for enhanced UX --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Auto-save indicator
            let saveTimeout;
            
            // Listen for form changes
            document.querySelectorAll('input, select, textarea').forEach(element => {
                element.addEventListener('input', function() {
                    // Clear existing timeout
                    clearTimeout(saveTimeout);
                    
                    // Show "unsaved changes" indicator
                    showUnsavedIndicator();
                    
                    // Auto-hide after 3 seconds
                    saveTimeout = setTimeout(() => {
                        hideUnsavedIndicator();
                    }, 3000);
                });
            });
            
            function showUnsavedIndicator() {
                // Add visual indicator for unsaved changes
                const saveButton = document.querySelector('[type="submit"]');
                if (saveButton && !saveButton.classList.contains('animate-pulse')) {
                    saveButton.classList.add('animate-pulse');
                }
            }
            
            function hideUnsavedIndicator() {
                const saveButton = document.querySelector('[type="submit"]');
                if (saveButton) {
                    saveButton.classList.remove('animate-pulse');
                }
            }

            // Smooth scroll to sections
            document.querySelectorAll('.fi-section-header').forEach(header => {
                header.style.cursor = 'pointer';
                header.addEventListener('click', function() {
                    const section = this.closest('.fi-section');
                    if (section) {
                        section.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });

            // Form validation feedback
            window.addEventListener('filament-validation-error', () => {
                // Scroll to first error
                const firstError = document.querySelector('.fi-fo-field-wrp-error');
                if (firstError) {
                    firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
                }
            });
        });
    </script>
</x-filament-panels::page>