<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Thanks
 *
 * @ORM\Table(name="thanks")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ThanksRepository")
 */
class Thanks
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
     * @ORM\Column(name="fromwho", type="integer")
     */
    private $fromwho;

    /**
     * @var int
     *
     * @ORM\Column(name="towho", type="integer")
     */
    private $towho;

    /**
     * @var string
     *
     * @ORM\Column(name="reason", type="string", length=512)
     */
    private $reason;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datethanks", type="datetime", nullable=true)
     */
    private $datethanks;


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
     * Set fromwho
     *
     * @param integer $fromwho
     *
     * @return Thanks
     */
    public function setFromwho($fromwho)
    {
        $this->fromwho = $fromwho;

        return $this;
    }

    /**
     * Get fromwho
     *
     * @return int
     */
    public function getFromwho()
    {
        return $this->fromwho;
    }

    /**
     * Set towho
     *
     * @param integer $towho
     *
     * @return Thanks
     */
    public function setTowho($towho)
    {
        $this->towho = $towho;

        return $this;
    }

    /**
     * Get towho
     *
     * @return int
     */
    public function getTowho()
    {
        return $this->towho;
    }

    /**
     * Set reason
     *
     * @param string $reason
     *
     * @return Thanks
     */
    public function setReason($reason)
    {
        $this->reason = $reason;

        return $this;
    }

    /**
     * Get reason
     *
     * @return string
     */
    public function getReason()
    {
        return $this->reason;
    }

    /**
     * Set datethanks
     *
     * @param \DateTime $datethanks
     *
     * @return Thanks
     */
    public function setDatethanks($datethanks)
    {
        $this->datethanks = $datethanks;

        return $this;
    }

    /**
     * Get datethanks
     *
     * @return \DateTime
     */
    public function getDatethanks()
    {
        return $this->datethanks;
    }
}

