<?php

namespace App\Entities;

class Annonce
{
    private $id;
    private $title;
    private $text;
    private $publi;

    /**
     * Get the value of publi
     */ 
    public function getPubli()
    {
        return $this->publi;
    }

    /**
     * Set the value of publi
     *
     * @return  self
     */ 
    public function setPubli($publi)
    {
        $this->publi = $publi;

        return $this;
    }

    /**
     * Get the value of text
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of text
     *
     * @return self
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
