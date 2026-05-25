<?php

namespace Nece\WebUi;

class UploaderSingle extends Uploader
{
    public function setPreview(bool $preview = true): static
    {
        $this->config['preview'] = $preview;
        return $this;
    }

    public function setValue(string $value): static
    {
        $this->config['value'] = $value;
        return $this;
    }
}
