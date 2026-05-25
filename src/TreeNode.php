<?php

namespace Nece\WebUi;

class TreeNode
{
    private static $nodes = [];

    private $id;
    private $title;
    private $checked;
    private $fixed;
    private $disabled;
    private $children = [];

    public static function getNode($id): TreeNode
    {
        return self::$nodes[$id] ?? new self($id, '');
    }

    public static function reset(): void
    {
        self::$nodes = [];
    }

    public function __construct($id, $title, bool $checked = false, bool $disabled = false, bool $fixed = false)
    {
        self::$nodes[$id] = $this;

        $this->id = $id;
        $this->title = $title;
        $this->checked = $checked;
        $this->disabled = $disabled;
        $this->fixed = $fixed;
    }

    public function addChild(TreeNode $child)
    {
        $this->children[] = $child;
    }

    public function getChildren(): array
    {
        return $this->children;
    }

    public function toArray()
    {
        static::reset();
        return [
            'id' => $this->id,
            'title' => $this->title,
            'checked' => $this->checked,
            'disabled' => $this->disabled,
            'fixed' => $this->fixed,
            'children' => $this->children ? array_map(function (TreeNode $item) {
                return $item->toArray();
            }, $this->children) : [],
        ];
    }
}
