<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
// use Illuminate\Mail\Mailables\Content;
// use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CustomerCheckout extends Mailable
{
    use Queueable, SerializesModels;

    private $checkout;

    /**
     * Create a new message instance.
     */
    public function __construct($checkout)
    {
        $this->checkout = $checkout;
    }

    public function build()
    {
        return $this->subject("Register Camp: {$this->checkout->Camp->title}")
                ->markdown('emails.customers.checkout', [
                    'checkout' => $this->checkout
                ]);
    }

    /**
     * Get the message envelope.
     *public function envelope(): Envelope
     *{
     *  return new Envelope(
     *       subject: "Register Camp",
     *    );
     *}
     */

    /**
     * Get the message content definition.
     *
     * public function content(): Content
     * {
     *   return new Content(
     *       markdown: 'emails.customers.checkout',
     *   );
     * }
     */

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     *
     * public function attachments(): array
     * {
     *   return [];
     * }
     */
}
