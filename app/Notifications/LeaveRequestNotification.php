<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LeaveRequestNotification extends Notification
{

    use Queueable;

    protected $leaveRequest;

    public function __construct($leaveRequest)
    {
        $this->leaveRequest = $leaveRequest;
    }

    public function via($notifiable)
    {
        return [ 'database']; // Anda bisa menambahkan 'database' jika ingin menyimpan notifikasi di database
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Pengajuan Cuti Baru')
            ->line('Pengguna telah mengajukan cuti.')
            ->action('Lihat Pengajuan', url('/admin/leave-requests'))
            ->line('Terima kasih!');
    }
}
