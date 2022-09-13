<?php

namespace TBOOT\View;

use TBOOT\Utils\Settings as Utils_Settings;

class Header extends View 
{
    public function __construct($args)
    {
        parent::__construct($args, [
            'logo_html' => $this->getCustomLogo()
        ]);
    }

    protected function getCustomLogo()
    {
        $logo_id = (int)Utils_Settings::getThemeOption('custom_logo', 0, false);
        return $logo_id ? $this->getImageHtml($logo_id, 'full', 'rect-500-100', 'cover', 'Logo') : '';
    }
}
