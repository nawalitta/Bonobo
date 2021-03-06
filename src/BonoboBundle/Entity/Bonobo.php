<?php

namespace BonoboBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bonobo
 *
 * @ORM\Table(name="bonobo")
 * @ORM\Entity(repositoryClass="BonoboBundle\Repository\BonoboRepository")
 */
class Bonobo
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="age", type="integer")
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="famille", type="string", length=30)
     */
    private $famille;

    /**
     * @var string
     *
     * @ORM\Column(name="race", type="string", length=30)
     */
    private $race;

    /**
     * @var string
     *
     * @ORM\Column(name="nouriture", type="string", length=30)
     */
    private $nouriture;

     
/**
     * @ORM\OneToMany(targetEntity="Bonobo",mappedBy="Bonobo") 
    
     */


private $amis; 

  public function __construct(){
   
    $this->amis = new \Doctrine\Common\Collections\ArrayCollection();
  }
    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set age
     *
     * @param integer $age
     *
     * @return Bonobo
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return int
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set famille
     *
     * @param string $famille
     *
     * @return Bonobo
     */
    public function setFamille($famille)
    {
        $this->famille = $famille;

        return $this;
    }

    /**
     * Get famille
     *
     * @return string
     */
    public function getFamille()
    {
        return $this->famille;
    }

    /**
     * Set race
     *
     * @param string $race
     *
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }

    /**
     * Get race
     *
     * @return string
     */
    public function getRace()
    {
        return $this->race;
     #* @return Bonobo
     #*/
    }

    /**
     * Set nouriture
     *
     * @param string $nouriture
     *
     * @return Bonobo
     */
    public function setNouriture($nouriture)
    {
        $this->nouriture = $nouriture;

        return $this;
    }

    /**
     * Get nouriture
     *
     * @return string
     */
    public function getNouriture()
    {
        return $this->nouriture;
    }

    /**
     * Add ami
     *
     * @param \BonoboBundle\Entity\Bonobo $ami
     *
     * @return Bonobo
     */
    public function addAmi(\BonoboBundle\Entity\Bonobo $ami)
    {
        $this->amis[] = $ami;

        return $this;
    }

    /**
     * Remove ami
     *
     * @param \BonoboBundle\Entity\Bonobo $ami
     */
    public function removeAmi(\BonoboBundle\Entity\Bonobo $ami)
    {
        $this->amis->removeElement($ami);
    }

    /**
     * Get amis
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAmis()
    {
        return $this->amis;
    }

    /**
     * Set race
     *
     * @param string $race
     *
     * @return Bonobo
     */
    public function setRace($race)
    {
        $this->race = $race;

        return $this;
    }
}
