<?php

declare(strict_types=1);

namespace App\Models\Card\Entity;

use App\Models\User\Entity\User;
use Database\Factories\CardFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $table = 'cards';

    public const NAME_TABLE = 'cards';

    protected $fillable = [
        'user_id',
        'text',
        'done'
    ];

    public static function create(User $user, string $text): self
    {
        $card = new self();

        $card->setText($text);
        $user->cards()->save($card);

        $card->save();

        return $card;
    }

    public function edit(?string $text, ?int $done): void
    {
        !$text ?: $this->setText($text);
        !$done ?: $this->setDone($done);

        $this->save();
    }

    private function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setDone(int $value): void
    {
        $this->done = $value;
    }

    public function getDone(): int
    {
        return $this->done;
    }

    public function getId(): Id
    {
        return $this->id;
    }

    protected static function newFactory(): CardFactory
    {
        return CardFactory::new();
    }
}
