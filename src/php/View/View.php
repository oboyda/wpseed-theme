<?php

namespace TBOOT\View;

class View extends \WPSEED\View 
{
    public function __construct($args, $default_args=[])
    {
        $default_args = wp_parse_args($default_args, [

            'id' => $this->getField('id', ''),
            'html_class' => $this->getField('html_class', ''),
            'hide' => $this->getField('hide', false),
            'hide_mobile' => (bool)$this->getField('hide_mobile', false),
            'hide_desktop' => (bool)$this->getField('hide_desktop', false),
            'top_level' => $this->getField('top_level', false),
            'padding_bottom' => $this->getField('padding_bottom', ''),
            'margin_bottom' => $this->getField('margin_bottom', ''),
            'container_class' => $this->getField('container_class', 'container-lg')
        ]);

        parent::__construct($args, $default_args);

        $this->setHtmlClass();
    }
    
    protected function getField($name, $default=null)
    {
        $_name = 'tboot__' . $this->getName(true) . '__' . $name;
        
        $field = get_field($_name);
        
        return !empty($field) ? $field : $default;
    }

    protected function getGroupField($group, $name, $default=null)
    {
        $_group = 'tboot__' . $this->getName(true) . '__' . $group;
        
        $field = get_field($_group);

        return (is_array($field) && isset($field[$name])) ? $field[$name] : $default;
    }

    protected function setHtmlClass()
    {
        if($this->args['bg_color'] !== '')
        {
            $bg_color = (strpos($this->args['bg_color'], 'bg-') === 0) ? $this->args['bg_color'] : 'bg-' . $this->args['bg_color'];
            $this->addHtmlClass($bg_color);
        }
        
        if($this->args['top_level'])
        {
            $this->addHtmlClass('section');
        }

        if($this->args['padding_bottom'] !== '')
        {
            $pb = ($this->args['padding_bottom'] === 'none') ? '0' : $this->args['padding_bottom'];
            $this->addHtmlClass('pb-' . $pb);
        }
        
        if($this->args['margin_bottom'] !== '')
        {
            $mb = ($this->args['margin_bottom'] === 'none') ? '0' : $this->args['margin_bottom'];
            $this->addHtmlClass('mb-' . $mb);
        }

        if($this->args['hide_mobile'])
        {
            $this->addHtmlClass('hide-mobile');
        }
        if($this->args['hide_desktop'])
        {
            $this->addHtmlClass('hide-desktop');
        }
    }
    
    protected function getAdminPostId()
    {
        return (is_admin() && isset($_GET['post'])) ? (int)$_GET['post'] : ((is_admin() && isset($_POST['post_id'])) ? (int)$_POST['post_id'] : 0);
    }
    
    public function encodeFieldToJson($field_name)
    {
        echo json_encode(is_array($this->$field_name) ? $this->$field_name : []);
    }
    
    public function getViewTag()
    {
        return $this->has_top_level() ? 'section' : 'div';
    }
    
    public function getContainerTagOpen($type='lg')
    {
        return $this->has_top_level() ? '<div class="container-' . $type . '">' : '';
    }
    
    public function getContainerTagClose()
    {
        return $this->has_top_level() ? '</div><!-- .container -->' : '';
    }

    static function implodeAtts($atts)
    {
        $_atts = [];

        if(!empty($atts) && is_array($atts))
        {
            foreach($atts as $att_name => $att)
            {
                $_att = is_array($att) ? implode(' ', $att) : $att;
                $_atts[] = $att_name . '="' . $_att . '"';
            }
        }

        return $_atts ? implode(' ', $_atts) : '';
    }

    static function getAttachmentImage($attachment_id, $size='full')
    {
        return $attachment_id ? wp_get_attachment_image($attachment_id, $size) : '';
    }

    static function getAttachmentImageSrc($attachment_id, $size='full')
    {
        $image_src = $attachment_id ? wp_get_attachment_image_src($attachment_id, $size) : [];
        return ($image_src && isset($image_src[0])) ? $image_src[0] : '';
    }

    static function getImageHtml($image, $size='full', $rel_class='rect-150-100', $fit_type='cover', $alt='')
    {
        $img_cont = '<div class="img-resp-cont img-' . $fit_type . ' ' . $rel_class . '">';
            $img_cont .= is_int($image) ? self::getAttachmentImage($image, $size) : '<img alt="' . $alt . '" src="' . $image . '" />';
        $img_cont .= '</div>';

        return $img_cont;
    }

    static function getBgImageHtml($image, $size='full', $rel_class='rect-150-100', $fit_class='cover', $atts=[])
    {
        $_image = is_int($image) ? self::getAttachmentImageSrc($image) : $image;

        if(isset($atts['class']))
        {
            $atts['class'] .= ' ' . $rel_class . ' ' . $fit_class;
        }
        else{
            $atts['class'] = 'bg-img bg-img-' . $fit_class . ' ' . $rel_class;
        }

        $_atts = self::implodeAtts($atts);

        return $_image ? '<div ' . $_atts . ' style="background-image: url(' . $_image . ')"></div>' : '';
    }

    public function getAdminEditButton()
    {
        if((!wp_doing_ajax() && is_admin()) || (wp_doing_ajax() && isset($_SERVER['HTTP_REFERER']) && strpos($_SERVER['HTTP_REFERER'], '/wp-admin') !== false))
        {
            echo '<div class="block-edit-handle">';
                echo '<span class="edit-handle">' . $this->getName() . '</span>';
            echo '</div>';
        }
    }
}
