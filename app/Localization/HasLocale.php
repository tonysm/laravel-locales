<?php

namespace App\Localization;

trait HasLocale
{
    public function locale()
    {
        return $this->locale;
    }
}