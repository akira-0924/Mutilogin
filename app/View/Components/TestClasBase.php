<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TestClasBase extends Component
{

    public $classBaseMassage;
    public $defaultMessage;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($classBaseMassage, $defaultMessage="初期値")
    {
        $this->classBaseMassage = $classBaseMassage;
        $this->defaultMessage = $defaultMessage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tests.test-clas-base-component');
    }
}
