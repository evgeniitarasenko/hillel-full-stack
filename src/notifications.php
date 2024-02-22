<?php

class User
{
    public string $email;
    public string $name;
    public string $phone;

    public function __construct(string $email, string $name, string $phone)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
    }
}

$user = new User('test@gmail.com', 'UserName', '+3801212121');
$hillelUser = new User('test@hillel.com', 'UserHillel', '+4801212121');

interface NotificationInterface
{
    public function send(): void;
}

abstract class AbstractNotification implements NotificationInterface
{
    protected string $message;

    protected User $recipient;

    public function __construct(string $message, User $recipient)
    {
        $this->message = $message;
        $this->recipient = $recipient;
    }
    abstract public function send(): void;
}

class EmailNotification extends AbstractNotification implements NotificationInterface
{
    public function send(): void
    {
        echo "Email notification to {$this->recipient->email}: {$this->render($this->message)}" . PHP_EOL . PHP_EOL;
    }

    protected function render(string $message): string
    {
        return "Привіт, {$this->recipient->name}! <h1>Нове повідмолення від Hillel IT school</h1>" .
            "<p class=\"text\">{$message}</p>";
    }
}

class SmsNotification extends AbstractNotification
{
    protected function validate(): bool
    {
        if (strlen($this->message) > 200) {
            return false;
        }

        return true;
    }

    public function send(): void
    {
        if (!$this->validate()) {
            return;
        }

        print "Sms notification to {$this->recipient->phone}: {$this->message}" . PHP_EOL . PHP_EOL;
    }
}

class TelegramNotification extends AbstractNotification
{
    public function send(): void
    {
        // TODO: Implement send() method.
    }
}

class SessionNotification implements NotificationInterface
{
    public function send(): void
    {
        $_SESSION[] = 'sdfdsfs';
    }
}

class Notifier
{
    protected array $notifications = [];

    public function addNotification(NotificationInterface $notification): Notifier
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


$smsNotification = new SmsNotification('sms message 1', $user);
$emailNotification = new EmailNotification('email message 1', $hillelUser);


$notifier = new Notifier();
$notifier->addNotification($smsNotification)
    ->addNotification($emailNotification)
    ->addNotification(new TelegramNotification('t message 1', $hillelUser))
    ->addNotification(new SessionNotification())
    ->send();

//print_r($notifier);