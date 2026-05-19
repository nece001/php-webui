<?php

namespace Nece\WebUi;

class NavItem
{
    protected $data = [];
    protected $parent = null;
    protected $children = [];

    public function __construct($id, $parent_id, string $url, string $text, string $icon = '', string $image = '', string $description = '', string $target = '')
    {
        $this->data = [
            'id' => $id,
            'parent_id' => $parent_id,
            'text' => $text,
            'url' => $url,
            'icon' => $icon,
            'image' => $image,
            'description' => $description,
            'target' => $target,
        ];
    }

    public function getId()
    {
        return $this->data['id'];
    }

    public function getParentId()
    {
        return $this->data['parent_id'];
    }

    public function getData(): array
    {
        return $this->data;
    }

    public function setData(array $data): self
    {
        $this->data = $data;
        return $this;
    }

    public function setParent(NavItem $parent): self
    {
        $this->parent = $parent;
        return $this;
    }

    public function getParent(): ?NavItem
    {
        return $this->parent;
    }

    public function addChild(NavItem $child): self
    {
        $child->setParent($this);
        $this->children[] = $child;
        return $this;
    }

    public function getChildren(): array
    {
        return $this->children;
    }

    public function toArray(): array
    {
        $data = $this->data;
        foreach ($this->children as $child) {
            $data['children'][] = $child->toArray();
        }
        return $data;
    }
}
