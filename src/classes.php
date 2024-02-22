<?php

class User
{
    public string $email;
    public string $phone;
    public string $name;

    public function __construct(string $email, string $phone, string $name)
    {
        $this->email = $email;
        $this->phone = $phone;
        $this->name = $name;
    }
}

$user = new User('test@gmail.com', '+3801212121', 'UserName');
$hillelUser = new User('test@hillel.com', '+4801212121', 'UserHillel');

interface Notification
{
    public function send(): void;
}

abstract class AbstractNotification implements Notification
{
    protected User $recipient;

    protected string $message;

    public function __construct(string $message, User $recipient)
    {
        $this->message = $message;
        $this->recipient = $recipient;
    }

    abstract public function send(): void;
}

class EmailNotification extends AbstractNotification
{

    public function validate(): bool
    {
        if (strpos($this->recipient->email, '@hillel.com')) {
            return false;
        }

        return true;
    }

    public function render(): string
    {
        return  "<h1>Нове повідмолення від Hillel IT school</h1>" .
            "<p class=\"text\">{$this->message}</p>";
    }

    public function send(): void
    {
        if (!$this->validate()) {
            return;
        }

        echo 'Email notification to ' . $this->recipient->email . ' ' .  $this->render() . PHP_EOL . PHP_EOL;
    }
}

class SmsNotification extends AbstractNotification
{

    public function validate(): bool
    {
        if (strlen($this->message) > 200) {
            return false;
        }

        return true;
    }

    public function render(): string
    {
        return $this->message;
    }

    public function send(): void
    {
        if (!$this->validate()) {
            return;
        }

        print 'Sms notification to ' . $this->recipient->phone . ' ' .  $this->render() . PHP_EOL . PHP_EOL;
    }
}

class Notifier
{
    protected array $notifications = [];

    public function addNotification(Notification $notification): Notifier
    {
        $this->notifications[] = $notification;

        return $this;
    }

    public function send(): void
    {
        foreach ($this->notifications as $notification) {
            $notification->send();
        }
    }
}

$emilNotification = new EmailNotification('email message 1', $user);
$smsNotification = new SmsNotification('sms message 1', $user);

$notifier = new Notifier();
$notifier->addNotification($emilNotification)
    ->addNotification($smsNotification)
    ->addNotification(new EmailNotification('email message 2', $user))
    ->addNotification(new EmailNotification('email message 3', $hillelUser))
    ->send();

