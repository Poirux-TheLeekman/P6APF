<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use App\Entity\Category;

    
    class Searchproperties
    {
        /**
        * @var (type="boolean", nullable=true)
         */
        private $publish;
        


        
        public function getPublish(): ?bool
        {
            return $this->publish;
        }
        
        public function setPublish(?bool $publish): self
        {
            $this->publish = $publish;
            
            return $this;
        }

        

        
        
        
  
}
