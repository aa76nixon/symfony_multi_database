<?php

declare(strict_types=1);

namespace App\Entity\Common\Taxonomy;

use App\Entity\Traits\IdentifiableTrait;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'app_taxon')]
#[ORM\Entity]
class Taxon
{
    use IdentifiableTrait;

    #[ORM\Column(type: 'integer', nullable: true)]
    protected ?int $position;

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(?int $position): void
    {
        $this->position = $position;
    }
}