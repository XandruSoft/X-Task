<?php

namespace Xandrusoft\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Checklist
 *
 * @ORM\Table(name="xsf_task__checklist")
 * @ORM\Entity(repositoryClass="Xandrusoft\TaskBundle\Repository\ChecklistRepository")
 */
class Checklist
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
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="Task", inversedBy="checklist")
     * @ORM\JoinColumn(name="task_id", referencedColumnName="id")
     */
    protected $task;

    /**
     * @ORM\OneToMany(targetEntity="Line", mappedBy="checklist")
     */
    protected $line;

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
     * Set title
     *
     * @param string $title
     *
     * @return Checklist
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set task
     *
     * @param \Xandrusoft\TaskBundle\Entity\Task $task
     *
     * @return Checklist
     */
    public function setTask(\Xandrusoft\TaskBundle\Entity\Task $task = null)
    {
        $this->task = $task;

        return $this;
    }

    /**
     * Get task
     *
     * @return \Xandrusoft\TaskBundle\Entity\Task
     */
    public function getTask()
    {
        return $this->task;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->line = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add line
     *
     * @param \Xandrusoft\TaskBundle\Entity\line $line
     *
     * @return Checklist
     */
    public function addLine(\Xandrusoft\TaskBundle\Entity\line $line)
    {
        $this->line[] = $line;

        return $this;
    }

    /**
     * Remove line
     *
     * @param \Xandrusoft\TaskBundle\Entity\line $line
     */
    public function removeLine(\Xandrusoft\TaskBundle\Entity\line $line)
    {
        $this->line->removeElement($line);
    }

    /**
     * Get line
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLine()
    {
        return $this->line;
    }
}
