<?php

namespace Nece\WebUi;

class Nav extends Component
{
    public function setLink(string $link): static
    {
        $this->config['link'] = $link;
        return $this;
    }

    public function setTarget(string $target): static
    {
        $this->config['target'] = $target;
        return $this;
    }

    public function setActive(bool $active = true): static
    {
        $this->config['active'] = $active;
        return $this;
    }

    public function setIcon(string $icon): static
    {
        $this->config['icon'] = $icon;
        return $this;
    }

    public function setImage(string $image): static
    {
        $this->config['image'] = $image;
        return $this;
    }

    public function setText(string $text): static
    {
        $this->config['text'] = $text;
        return $this;
    }

    public function setDescription(string $description): static
    {
        $this->setAttribute('title', $description);
        return $this;
    }

    public function setLine(bool $line = true): static
    {
        $this->config['line'] = $line;
        return $this;
    }

    public function setTree(bool $tree = true): static
    {
        $this->config['tree'] = $tree;
        return $this;
    }

    public function setSide(bool $side = true): static
    {
        $this->config['side'] = $side;
        return $this;
    }

    public function addChild(Component $child): static
    {
        if (!$child instanceof Nav) {
            throw new \Exception('Nav only accept Nav child');
        }

        $this->children[] = $child;
        return $this;
    }

    public function addLine(): static
    {
        return $this->addChild((new Nav())->setLine(true));
    }
}
