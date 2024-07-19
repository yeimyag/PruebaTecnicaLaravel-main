<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CorreoMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $titulo;

    public $descripcion;

    public $fecha;

    public function __construct($titulo, $descripcion, $fecha)
    {
        $this->titulo=$titulo;
        $this->descripcion=$descripcion;
        $this->fecha=$fecha;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Tarea '.$this->titulo
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'email.correo',
            with: [
                'titulo'=>$this->titulo,
                'descripcion'=>$this->descripcion,
                'fecha'=>$this->fecha
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
