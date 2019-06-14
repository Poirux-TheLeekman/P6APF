<?php

namespace App\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


use App\Entity\Category;
/**
 * @ORM\Entity(repositoryClass="App\Repository\ActorRepository")
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
     */
    private $name;
    
    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;
    
    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $phone;
    
    /**
     * @ORM\Column(type="string", length=255)
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
     * @ORM\ManyToMany(targetEntity="App\Entity\Category",  inversedBy="actors", cascade={"persist"})
     */
    private $categories;
    
    
    
    public function __construct()
    {
        $this->categories = new ArrayCollection();
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
    
    /**
     * @return Collection|Category[]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }
    
    public function addCategory(Category $category): self
    {
        if (!$this->categories->contains($category)) {
            $this->categories[] = $category;
            $category->addActor($this);
        }
        
        return $this;
    }
    
    public function removeCategory(Category $category): self
    {
        if ($this->categories->contains($category)) {
            $this->categories->removeElement($category);
            $category->removeActor($this);
        }
        
        return $this;
    }
    public function updatecategories($category) {
        $this->categories[]=$category ;
    }
    
    
}
