<?php
namespace App\Traits;

trait HasSlug {
    
    public function generateSlug()
    {
        return str()->slug($this->getSlugSource());
    }
    
    public function save(array $options = [])
    {     
        if ($this->isDirty('title') && $this->slug !== $this->generateSlug()) {
            $this->slug = $this->generateSlug();
        }

        parent::save($options);
    }

    public function getSlugSource() : string
    {
        return $this->title;
    }
}