<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Queue\SerializesModels;
use App\Models\AppTester;

class TestInvitation extends Mailable
{
    use Queueable, SerializesModels;

    public $tester;

    public function __construct(AppTester $tester)
    {
        $this->tester = $tester;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Undangan Penguji Aplikasi ' . $this->tester->app->app_name,
            from: new Address('developer@artadev.my.id', 'Artadev'),
            replyTo: [new Address('developer@artadev.my.id', 'Artadev')]
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.test-invitation',
            with: [
                'name' => $this->tester->name,
                'appName' => $this->tester->app->app_name,
                'testLink' => $this->tester->app->internal_test_link,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
