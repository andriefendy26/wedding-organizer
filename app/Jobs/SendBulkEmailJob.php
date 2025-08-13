<?php
namespace App\Jobs;

use App\Mail\PromotionalMail;
use App\Models\EmailCampaign;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendBulkEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $campaignId;
    protected $emailBatch;

    public function __construct($campaignId, $emailBatch)
    {
        $this->campaignId = $campaignId;
        $this->emailBatch = $emailBatch;
    }

    public function handle()
    {
        $campaign = EmailCampaign::findOrFail($this->campaignId);
        
        foreach ($this->emailBatch as $emailData) {
            try {
                Mail::to($emailData['email'])
                    ->send(new PromotionalMail(
                        $campaign->subject,
                        $campaign->content,
                        $emailData['name']
                    ));
                
                $campaign->increment('sent_count');
                Log::info("Email sent successfully to: " . $emailData['email']);
                
            } catch (\Exception $e) {
                $campaign->increment('failed_count');
                Log::error("Failed to send email to: " . $emailData['email'] . " - " . $e->getMessage());
            }
            
            sleep(1); // Delay 1 detik antar email
        }
        
        // Update status jika semua email sudah terkirim
        $campaign->refresh();
        if ($campaign->sent_count + $campaign->failed_count >= $campaign->total_recipients) {
            $campaign->update(['status' => 'sent']);
        }
    }
}