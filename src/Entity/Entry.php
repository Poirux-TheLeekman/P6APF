<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;


use App\Entity\Category;
/**
 * @ORM\Entity(repositoryClass="App\Repository\EntryRepository")
 * @UniqueEntity("name")
 */
class Entry
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length=255)
     *
     */
    private $name;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;
    
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $address;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    
    private $phone;
    
    /**
     * @ORM\Column(type="string",nullable=true, length=255)
     */
    private $mail;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $fax;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $website;
    
    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $logo;
    
    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $publish;
    


    /**
     * @ORM\Column(type="float", nullable=false)
     */
    private $lat;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    private $lng;

    /**
     * @var ArrayCollection
     * Owning Side
     * @ORM\ManyToMany(targetEntity="App\Entity\Category", inversedBy="entries", cascade={"persist", "merge"})
     * @ORM\JoinTable(name="entry_category")
     *      joinColumns={@JoinColumn(name="entry_id", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="category_id", referencedColumnName="id")}
     *      )
     */
    private $Categories;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $PmrAccess;


    
    
    public function __construct()
    {
        $this->Categories = new ArrayCollection();
    }
    
    
    
    public function getId(): ?int
    {
        return $this->id;
    }
    
    public function getName(): ?string
    {
        return $this->name;
    }
    
    public function setName(string $name): self
    {
        $this->name = $name;
        
        return $this;
    }
    
    public function getDescription(): ?string
    {
        return $this->description;
    }
    
    public function setDescription(?string $description): self
    {
        $this->description = $description;
        
        return $this;
    }
    
    public function getPhone(): ?int
    {
        return $this->phone;
    }
    
    public function setPhone(?int $phone): self
    {
        $this->phone = $phone;
        
        return $this;
    }
    
    public function getMail(): ?string
    {
        return $this->mail;
    }
    
    public function setMail(string $mail): self
    {
        $this->mail = $mail;
        
        return $this;
    }
    
    public function getFax(): ?int
    {
        return $this->fax;
    }
    
    public function setFax(?int $fax): self
    {
        $this->fax = $fax;
        
        return $this;
    }
    
    public function getWebsite(): ?string
    {
        return $this->website;
    }
    
    public function setWebsite(?string $website): self
    {
        $this->website = $website;
        
        return $this;
    }
    
    public function getLogo(): ?string
    {
        return $this->logo;
    }
    
    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;
        
        return $this;
    }
    
    public function getPublish(): ?bool
    {
        return $this->publish;
    }
    
    public function setPublish(?bool $publish): self
    {
        $this->publish = $publish;
        
        return $this;
    }
    
  

    public function getLat(): ?float
    {
        return $this->lat;
    }

    public function setLat(?float $lat): self
    {
        $this->lat = $lat;

        return $this;
    }

    public function getLng(): ?float
    {
        return $this->lng;
    }

    public function setLng(?float $lng): self
    {
        $this->lng = $lng;

        return $this;
    }
    public function getAddress(): ?string
    {
        return $this->address;
    }
    
    public function setAddress(string $address): self
    {
        $this->address = $address;
        
        return $this;
    }

    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->Categories;
    }

    public function addCategory(Category $category): self
    {
        if (!$this->Categories->contains($category)) {
            $this->Categories[] = $category;
        }

        return $this;
    }

    public function removeCategory(Category $category): self
    {
        if ($this->Categories->contains($category)) {
            $this->Categories->removeElement($category);
        }

        return $this;
    }

    public function getPmrAccess(): ?bool
    {
        return $this->PmrAccess;
    }

    public function setPmrAccess(?bool $PmrAccess): self
    {
        $this->PmrAccess = $PmrAccess;

        return $this;
    }
  
    
    
}
