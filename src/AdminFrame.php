<?php

namespace Nece\WebUi;

class AdminFrame extends Component
{
    public function setLogoImage(string $logo_image): self
    {
        $this->config['logo_image'] = $logo_image;
        return $this;
    }

    public function setLogoText(string $logo_text): self
    {
        $this->config['logo_text'] = $logo_text;
        return $this;
    }

    public function setNavRoot(NavItem $nav_root): self
    {
        $this->config['nav_root'] = $nav_root;
        return $this;
    }

    public function setAvatarRoot(NavItem $avatar_root): self
    {
        $this->config['avatar_root'] = $avatar_root;
        return $this;
    }

    public function setMenuRoot(NavItem $menu_root): self
    {
        $this->config['menu_root'] = $menu_root;
        return $this;
    }

    public function setDefaultUrl(string $default_url): self
    {
        $this->config['default_url'] = $default_url;
        return $this;
    }

    public function setFooterContent(string $footer_content): self
    {
        $this->config['footer_content'] = $footer_content;
        return $this;
    }

    public function setFrameName(string $frame_name): self
    {
        $this->config['frame_name'] = $frame_name;
        return $this;
    }
}
