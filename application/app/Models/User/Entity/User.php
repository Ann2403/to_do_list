<?php

namespace App\Models\User\Entity;

use App\Models\Card\Entity\Card;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'email',
        'password',
    ];

    /**
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getIncrementing(): bool
    {
        return false;
    }

    public function getKeyType(): string
    {
        return 'string';
    }

    public static function createByEmail(Email $email, string $passwordHash): self
    {
        $user = new self();

        $user->setId(Id::next());
        $user->setEmail($email);
        $user->setPassword($passwordHash);

        $user->save();

        return $user;
    }

    private function setId(Id $id): void
    {
        $this->id = $id->getValue();
    }

    public function getId(): Id
    {
        return new Id($this->id);
    }

    private function setEmail(Email $email): void
    {
        $this->email = $email->getValue();
    }

    public function getEmail(): Email
    {
        return new Email($this->email);
    }

    private function setPassword(string $hashPassword): void
    {
        $this->password = $hashPassword;
    }

    public function cards(): HasMany
    {
        return $this->hasMany(Card::class);
    }

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}
