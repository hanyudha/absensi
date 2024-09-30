<?php

namespace App\Notifications;

use App\Models\Cuti;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CutiStatusChangedNotification extends Notification
{
    use Queueable;

    protected $cuti;

    public function __construct(Cuti $cuti)
    {
        $this->cuti = $cuti;
    }

    public function via($notifiable)
    {
        return [ 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Status Pengajuan Cuti Diperbarui')
                    ->greeting('Hello ' . $this->cuti->user->name . ',')
                    ->line('Status pengajuan cuti kamu telah diperbarui menjadi ' . $this->cuti->status)
                    ->action('Lihat Pengajuan', url('/cuti'))
                    ->line('Terima kasih sudah menggunakan layanan kami.');
    }

    public function toArray($notifiable)
{
    return [
        'cuti_id' => $this->cuti->id,
        'status' => $this->cuti->status,
        'user_name' => $this->cuti->user->name,  // Pastikan kunci 'user_name' ada
    ];
}

}
