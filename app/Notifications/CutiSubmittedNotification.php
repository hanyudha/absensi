<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Cuti;

class CutiSubmittedNotification extends Notification
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
                    ->line('Ada pengajuan cuti baru.')
                    ->action('Lihat Pengajuan', url('/admin/cuti'))
                    ->line('Segera proses pengajuan cuti ini.');
    }

    public function toArray($notifiable)
    {
        return [
            'user_name' => $this->cuti->user->name,
            'alasan' => $this->cuti->alasan,
            'tanggal_mulai' => $this->cuti->tanggal_mulai,
            'tanggal_selesai' => $this->cuti->tanggal_selesai,
        ];
    }
}
