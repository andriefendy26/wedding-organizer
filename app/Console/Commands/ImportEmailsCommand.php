<?php
namespace App\Console\Commands;

use App\Models\EmailList;
use Illuminate\Console\Command;
use League\Csv\Reader;

class ImportEmailsCommand extends Command
{
    protected $signature = 'emails:import {file}';
    protected $description = 'Import emails from CSV file';

    public function handle()
    {
        $file = $this->argument('file');
        
        if (!file_exists($file)) {
            $this->error('File not found!');
            return;
        }
        
        $csv = Reader::createFromPath($file, 'r');
        $csv->setHeaderOffset(0);
        
        $imported = 0;
        foreach ($csv->getRecords() as $record) {
            try {
                EmailList::updateOrCreate(
                    ['email' => $record['email']],
                    [
                        'name' => $record['name'] ?? 'Unknown',
                        'status' => 'active',
                        'tags' => isset($record['tags']) ? explode(',', $record['tags']) : []
                    ]
                );
                $imported++;
            } catch (\Exception $e) {
                $this->warn("Failed to import: " . ($record['email'] ?? 'unknown'));
            }
        }
        
        $this->info("Imported {$imported} email addresses.");
    }
}