<?php

namespace App\Supports;

use Flasher\Toastr\Prime\ToastrFactory;

class Notify
{   
    /** @var ToastrFactory */
    protected $toastr;

    /**
     * Constructor
     * @param ToastrFactory $toastr
     */
    public function __construct(ToastrFactory $toastr)
    {
        $this->toastr = $toastr;
    }

    /**
     * @param string $message
     */
    function success(string $message): void
    {
        $this->toastr->addSuccess($message);
    }

    /**
     * @param string $message
     */
    function info(string $message): void
    {
        $this->toastr->addInfo($message);
    }

    /**
     * @param string $message
     */
    function warning(string $message): void
    {
        $this->toastr->addWarning($message);
    }

    /**
     * @param string $message
     */
    function error(string $message): void
    {
        $this->toastr->addError($message);
    }
}