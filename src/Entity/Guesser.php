<?php

namespace App\Entity;

use App\Repository\GuesserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GuesserRepository::class)
 */
class Guesser 
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $guessedNumber;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $userNumber;

    public function getGuessedNumber(): ?int
    {
        return $this->guessedNumber;
    }
    public function setGuessedNumber(string $guessedNumber): self
    {
        return $this->guessedNumber = $guessedNumber;

        return $this;
    }

    public function getUserNumber(): ?string
    {
        return $this->userNumber;
    }

    public function setUserNumber(string $userNumber): self
    {
        $this->userNumber = $userNumber;

        return $this;
    }
}
