<?php

namespace App\Entity\Common\Page;

use App\Entity\Traits\IdentifiableTrait;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Table(name: 'app_page')]
#[ORM\Entity]
class Page
{
    use IdentifiableTrait;

    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $name = null;

    #[ORM\JoinTable(name: 'app_page_taxon')]
    #[ORM\JoinColumn(name: 'page_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'taxon_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: \App\Entity\Common\Taxonomy\Taxon::class)]
    protected Collection $taxons;


    public function __construct()
    {
        $this->taxons = new ArrayCollection();
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getTaxons(): Collection
    {
        return $this->taxons;
    }

    public function setTaxons(Collection $taxons): void
    {
        $this->taxons = $taxons;
    }
}