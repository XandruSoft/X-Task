<?php

namespace Xandrusoft\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Board
 *
 * @ORM\Table(name="xsf_task__board")
 * @ORM\Entity(repositoryClass="Xandrusoft\TaskBundle\Repository\BoardRepository")
 */
class Board
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="idBoard", type="string", length=255)
     */
    private $idBoard;

    /**
     * @var bool
     *
     * @ORM\Column(name="subscribed", type="boolean")
     */
    private $subscribed;

    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="task")
     */
    protected $task;

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
     * Set name
     *
     * @param string $name
     *
     * @return Board
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set idBoard
     *
     * @param string $idBoard
     *
     * @return Board
     */
    public function setIdBoard($idBoard)
    {
        $this->idBoard = $idBoard;

        return $this;
    }

    /**
     * Get idBoard
     *
     * @return string
     */
    public function getIdBoard()
    {
        return $this->idBoard;
    }

    /**
     * Set subscribed
     *
     * @param boolean $subscribed
     *
     * @return Board
     */
    public function setSubscribed($subscribed)
    {
        $this->subscribed = $subscribed;

        return $this;
    }

    /**
     * Get subscribed
     *
     * @return bool
     */
    public function getSubscribed()
    {
        return $this->subscribed;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->task = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add task
     *
     * @param \Xandrusoft\TaskBundle\Entity\Task $task
     *
     * @return Board
     */
    public function addTask(\Xandrusoft\TaskBundle\Entity\Task $task)
    {
        $this->task[] = $task;

        return $this;
    }

    /**
     * Remove task
     *
     * @param \Xandrusoft\TaskBundle\Entity\Task $task
     */
    public function removeTask(\Xandrusoft\TaskBundle\Entity\Task $task)
    {
        $this->task->removeElement($task);
    }

    /**
     * Get task
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTask()
    {
        return $this->task;
    }
}
