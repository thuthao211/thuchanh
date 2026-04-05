<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
<<<<<<< HEAD
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
=======
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
>>>>>>> remotes/origin/thachthao

class TestSendEmail extends Notification
{
    use Queueable;

<<<<<<< HEAD
    protected $data;
    protected $quantity;

    public function __construct($data, $quantity)
    {
        $this->data = $data;
        $this->quantity = $quantity;
=======
    private $data;

    public function __construct($data)
    {
        $this->data = $data;
>>>>>>> remotes/origin/thachthao
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
<<<<<<< HEAD
        $mail = (new MailMessage)
            ->subject('Xác nhận đơn hàng thành công')
            ->greeting('Chào ' . $notifiable->name . '!')
            ->line('Đơn hàng của bạn đã được hệ thống ghi nhận.');

        foreach ($this->data as $row) {
            $qty = $this->quantity[$row->id];
            $mail->line("- " . $row->tieu_de . " | SL: " . $qty . " | Giá: " . number_format($row->gia_ban) . " VNĐ");
        }

        return $mail->action('Xem trang chủ', url('/'))
                    ->line('Cảm ơn bạn đã mua sắm!');
=======
        return (new MailMessage)
                    ->subject("Đặt hàng thành công")
                    ->view("email_template.don_hang_thanh_cong", ["data" => $this->data]);
>>>>>>> remotes/origin/thachthao
    }
}