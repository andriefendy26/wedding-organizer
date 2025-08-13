<?php
// app/Mail/PromotionalMail.php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PromotionalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $recipientName;

    public function __construct($subject, $content, $recipientName = null)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->recipientName = $recipientName;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.promotional',
            with: [
                'content' => $this->content,
                'recipientName' => $this->recipientName
            ]
        );
    }
}