<?php

class TrafficLight
{
    private $lights;
    private $code;
    private $active;

    public function __construct($code)
    {
        $this->code = $code;
        $this->active = true;
        $this->lights = [
            'red' => 1,
            'orange' => 0,
            'green' => 0,
        ];
    }

    public function switchOn($color)
    {
        if ($this->active === false) {
            return;
        }
        if (!$this->isValidColor($color)) {
            echo 'Ik heb geen licht met de kleur: ' . $color . "\n";

            return;
        }

        $this->lights[$color] = 0;
    }

    public function switchOff($color)
    {
        $validColors = ['red', 'orange', 'green'];
        if (!$this->isValidColor($color)) {
            echo 'Ik heb geen licht met de kleur: ' . $color . "\n";
            return;
        }
        $this->switchAllLightsOff();
        $this->lights[$color] = 1;
    }

    public function deactivateTrafficLight()
    {
        $this->active = false;
        $this->switchAllLightsOff();
    }

    public function activateTrafficLight()
    {
        $this->active = true;
        $this->switchOn('red');
    }

    public function getCode()
    {
        return $this->code;
    }

    public function showLightStatus()
    {
        echo 'Status van Stoplicht ' . $this->code . ":\n";

        if ($this->active === true) {
            foreach ($this->lights as $color => $status) {
                echo $color . ' --> ' . $status . "\n";
            }
        } else {
            echo 'Stoplicht inactief: oranje knippert' . "\n";
        }
    }

    private function isValidColor($color)
    {
        $validColors = ['red', 'orange', 'green'];
        if (in_array($color, $validColors)) {
            return true;
        } else {
            return false;
        }
    }

    private function switchAllLightsOff()
    {
        foreach ($this->lights as $color => $status) {
            $this->lights[$color] = 0;
        }
    }
}