<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\Invoice;
use App\Mail\ImprovedInvoice;
use App\Mail\ImprovedInvoiceX;

class MailController extends Controller {
    function sendTestEmail() {
        // Mail::send('emails.test', [], function ($message) {
        //     $message->to('hasin@hasinhayder.com', 'H2');
        //     $message->subject('Test Email 2');
        //     $message->from('hasin@hasin.me', 'Hasin Hayder');
        // });

        Mail::send(['text'=>'emails.text'], [], function ($message) {
            $message->to('hasin@hasinhayder.com', 'H2');
            $message->subject('Test Email 2');
            $message->from('hasin@hasin.me', 'Hasin Hayder');
        });
        return 'Email Sent';
    }

    function sendTestEmailWithData(){
        $data = [
            'orderid'=>16,
            'ordertotal'=>5000,
        ];
        // Mail::send(['html'=>'emails.data'], $data, function ($message) {
        //     $message->to('hasin@hasinhayder.com', 'H2');
        //     $message->subject('Test Email - With Data');
        //     $message->from('hasin@hasin.me', 'Hasin Hayder');
        // });

        // Mail::send(['html'=>'emails.data'], $data, function ($message) {
        //     $message->to('hasin@hasinhayder.com', 'H2');
        //     $message->subject('Test Email - With Data, Image and Attachments');
        //     $message->from('hasin@hasin.me', 'Hasin Hayder');
        //     $message->attach(public_path('files/data.pdf'), [
        //         'as' => 'invoice.pdf',
        //         'mime' => 'application/pdf',
        //     ]);
        // });

        Mail::send(['html'=>'emails.data-image'], $data, function ($message) {
            $message->to('hasin@hasinhayder.com', 'H2');
            $message->subject('Test Email - With Data, Image and Attachments');
            $message->from('hasin@hasin.me', 'Hasin Hayder');
            $message->attach(public_path('files/data.pdf'), [
                'as' => 'invoice.pdf',
                'mime' => 'application/pdf',
            ]);
        });
        return 'Email Sent';
    }

    function sendMailWithMailable(){
        $data = [
            'orderid'=>16,
            'ordertotal'=>5000,
        ];
        // Mail::to('hasin@hasinhayder.com', 'H2')->send(new Invoice());
        // Mail::to('hasin@hasinhayder.com', 'H2')->send(new ImprovedInvoice($data));
        Mail::to('hasin@hasinhayder.com', 'H2')->send(new ImprovedInvoiceX($data));
        return 'Email Sent';
    }
}
