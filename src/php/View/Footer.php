<?php

namespace WPTBOOT\View;

use WPTBOOT\Utils\Settings as Utils_Settings;
use WPPBOOT\Utils\Date as Utils_Date;

class Footer extends View 
{
    public function __construct($args)
    {
        parent::__construct($args, [

            'footer_info1' => Utils_Settings::getThemeOption('footer_info1'),
            'footer_info2' => Utils_Settings::getThemeOption('footer_info2'),
            'logo_html' => $this->getCustomLogo()
        ]);

        $this->args['footer_info1'] = $this->replacePlaceholders($this->args['footer_info1']);
        $this->args['footer_info2'] = $this->replacePlaceholders($this->args['footer_info2']);
    }

    protected function replacePlaceholders($text)
    {
        $placeholders = [
            '%year%' => Utils_Date::getNowDate('Y')
        ];

        return !empty($text) ? str_replace(array_keys($placeholders), array_values($placeholders), $text) : $text;
    }

    public function getImplodedFooterInfo($sep=' | ')
    {
        $infos = [];
        if($this->has_footer_info1())
        {
            $infos[] = $this->get_footer_info1();
        }
        if($this->has_footer_info2())
        {
            $infos[] = $this->get_footer_info2();
        }
        return implode($sep, $infos);
    }

    protected function getCustomLogo()
    {
        $logo_id = (int)get_theme_mod('custom_logo');
        return $logo_id ? $this->getImageHtml($logo_id, 'full', 'rect-500-100', 'cover', 'Logo') : '';
    }
}
