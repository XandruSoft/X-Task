<?php

namespace Xandrusoft\TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserTask
 *
 * @ORM\Table(name="xsf_task__user_task")
 * @ORM\Entity(repositoryClass="Xandrusoft\TaskBundle\Repository\UserTaskRepository")
 */
class UserTask
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="CoreBundle\Entity\User", inversedBy="user_task")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\OneToMany(targetEntity="Task", mappedBy="user_task")
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
     * Set date
     *
     * @param \DateTime $date
     *
     * @return UserTask
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->task = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set user
     *
     * @param \Xandrusoft\TaskBundle\Entity\User $user
     *
     * @return UserTask
     */
    public function setUser(\Xandrusoft\TaskBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Xandrusoft\TaskBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add task
     *
     * @param \Xandrusoft\TaskBundle\Entity\task $task
     *
     * @return UserTask
     */
    public function addTask(\Xandrusoft\TaskBundle\Entity\task $task)
    {
        $this->task[] = $task;

        return $this;
    }

    /**
     * Remove task
     *
     * @param \Xandrusoft\TaskBundle\Entity\task $task
     */
    public function removeTask(\Xandrusoft\TaskBundle\Entity\task $task)
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
