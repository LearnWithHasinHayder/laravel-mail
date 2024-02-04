<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Attachment;

class ImprovedInvoiceX extends Mailable
{
    use Queueable, SerializesModels;
    // public $order;
    /**
     * Create a new message instance.
     */
    public function __construct(public $order){}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Improved Invoice X',
            from: 'hasin@hasin.me'
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.datax',
            // with: ['order'=>$this->order]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            // public_path('files/data.pdf')
            // Attachment::fromPath('files/data.pdf')->as('invoice.pdf')->withMime('application/pdf')
            Attachment::fromStorage('/files/inv.pdf')->as('invoicexyz.pdf')->withMime('application/pdf')
        ];
    }
}
