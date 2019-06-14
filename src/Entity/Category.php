<?php

namespace App\Entity;



    
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
    /**
     * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
     */
    class Category
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
         * @ORM\Column(type="string", length=255, nullable=true))
         */
        private $iconName;
        
        /**
         * @Assert\NotBlank(message="Ajouter une image png")
         * @Assert\File(mimeTypes={ "image/png" })
         */
        private $icon;
        
        
        /**
         * @ORM\ManyToMany(targetEntity="App\Entity\Entry", inversedBy="categories")
         */
        private $actors;
        
        public function __construct()
        {
            $this->actors = new ArrayCollection();
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
        
        public function getIconName(): ?string
        {
            return $this->iconName;
        }
        
        public function setIconName(string $iconName): self
        {
            
            $this->iconName = $iconName;
            
            return $this;
        }
        
        
        public function getIcon()
        {
            return $this->icon;
        }
        
        public function setIcon($icon): self
        {
            $this->icon = $icon;
            return $this;
            
            
        }
        
        /**
         * @return Collection|Actor[]
         */
        public function getActors(): Collection
        {
            return $this->actors;
        }
        
        public function addActor(Actor $actor): self
        {
            if (!$this->actors->contains($actor)) {
                $this->actors[] = $actor;
            }
            
            return $this;
        }
        
        public function removeActor(Actor $actor): self
        {
            if ($this->actors->contains($actor)) {
                $this->actors->removeElement($actor);
            }
            
            return $this;
        }
}
