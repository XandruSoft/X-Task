<?php

namespace Xandrusoft\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Line
 *
 * @ORM\Table(name="xsf_task__line")
 * @ORM\Entity(repositoryClass="Xandrusoft\TaskBundle\Repository\LineRepository")
 */
class Line
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
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @ORM\ManyToOne(targetEntity="Checklist", inversedBy="line")
     * @ORM\JoinColumn(name="checklist_id", referencedColumnName="id")
     */
    protected $checklist;

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
     * Set description
     *
     * @param string $description
     *
     * @return Line
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set checklist
     *
     * @param \Xandrusoft\TaskBundle\Entity\checklist $checklist
     *
     * @return Line
     */
    public function setChecklist(\Xandrusoft\TaskBundle\Entity\checklist $checklist = null)
    {
        $this->checklist = $checklist;

        return $this;
    }

    /**
     * Get checklist
     *
     * @return \Xandrusoft\TaskBundle\Entity\checklist
     */
    public function getChecklist()
    {
        return $this->checklist;
    }
}
