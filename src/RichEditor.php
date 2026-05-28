<?php

namespace Nece\WebUi;

class RichEditor extends Control
{
    public function setRenderName(string $render_name): self
    {
        $this->config['render_name'] = $render_name;
        return $this;
    }

    public function setContent(string $content): self
    {
        $this->config['content'] = $content;
        return $this;
    }

    public function setScroll(bool $scroll = true): self
    {
        $this->config['scroll'] = $scroll;
        return $this;
    }

    public function setContentHeight(int $height): self
    {
        $this->config['content_height'] = $height;
        return $this;
    }

    public function setMetas(array $metas): self
    {
        $this->config['metas'] = $metas;
        return $this;
    }

    public function setMetaWithUrl(bool $meta_with_url = true): self
    {
        $this->config['meta_with_url'] = $meta_with_url;
        return $this;
    }

    public function setHeaders(array $headers): self
    {
        $this->config['headers'] = $headers;
        return $this;
    }

    public function setWithCredentials(bool $with_credentials = true): self
    {
        $this->config['with_credentials'] = $with_credentials;
        return $this;
    }

    public function setUploadTimeout(int $timeout): self
    {
        $this->config['upload_timeout'] = $timeout;
        return $this;
    }

    public function setUploadImage(string $url, string $field_name, array $allowed_file_types = [], float $max_file_size = 0, int $max_number_of_files = 0): self
    {
        $this->config['upload_image'] = [
            'url' => $url,
            'field_name' => $field_name,
            'allowed_file_types' => $allowed_file_types ? $allowed_file_types : null,
            'max_file_size' => $max_file_size ? $max_file_size : null,
            'max_number_of_files' => $max_number_of_files ? $max_number_of_files : null,
        ];
        return $this;
    }

    public function setUploadVideo(string $url, string $field_name, array $allowed_file_types = [], float $max_file_size = 0, int $max_number_of_files = 0): self
    {
        $this->config['upload_video'] = [
            'url' => $url,
            'field_name' => $field_name,
            'allowed_file_types' => $allowed_file_types ? $allowed_file_types : null,
            'max_file_size' => $max_file_size ? $max_file_size : null,
            'max_number_of_files' => $max_number_of_files ? $max_number_of_files : null,
        ];
        return $this;
    }
}
