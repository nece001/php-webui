<?php

namespace Nece\WebUi;

class NavTree
{
    private  $items = [];

    public  function addItem(NavItem $item)
    {
        $id = $item->getId();
        $parent_id = $item->getParentId();

        $parent = $this->items[$parent_id] ?? null;
        if (!$parent) {
            $parent = new NavItem($parent_id, $parent_id, '', '');
            $this->items[$parent_id] = $parent;
        }

        if (isset($this->items[$id])) {
            $this->items[$id]->setData($item->getData());
            $this->items[$parent_id]->addChild($this->items[$id]);
        } else {
            $parent->addChild($item);
            $this->items[$id] = $item;
        }
    }

    public  function getRootItem(): NavItem
    {
        foreach ($this->items as $item) {
            if (!$item->getParent()) {
                return $item;
            }
        }
        return array_shift($this->items);
    }

    public  function toArray(): array
    {
        $root = $this->getRootItem();
        $data = $root->toArray();
        return $data['children'];
    }
}
