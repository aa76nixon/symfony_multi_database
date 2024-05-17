<?php

namespace App\Entity\Term\Quiz;

use App\Entity\Traits\IdentifiableTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'app_quiz')]
#[ORM\Entity]
class Quiz
{
    use IdentifiableTrait;

    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $name = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    protected ?int $taxonomyId = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getTaxonomyId(): ?int
    {
        return $this->taxonomyId;
    }

    public function setTaxonomyId(?int $taxonomyId): void
    {
        $this->taxonomyId = $taxonomyId;
    }
}