<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Api
 * @package AppBundle\Entity
 *
 * @ORM\Table(name="api")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ApiRepository")
 */
class Api
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=20)
     */
    private $name;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $enabled = false;

    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $baseUrl;

    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $token;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param bool $enabled
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    /**
     * @param string $baseUrl
     */
    public function setBaseUrl($baseUrl)
    {
        $this->baseUrl = $baseUrl;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    public function __toString() {
        $status = $this->isEnabled() == 1 ? 'enabled' : 'disabled';
        return $this->id . ' ' . $this->name . " API ($status)";
    }
}