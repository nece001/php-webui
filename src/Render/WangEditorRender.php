<?php

namespace Nece\WebUi\Render;

use Nece\WebUi\Render;

class WangEditorRender extends Render
{
    private $ediotr_id = '';
    public function render(): string
    {
        $this->ediotr_id = $this->component->getId();

        $this->buildJavaScript();
        return $this->buildHtml();
    }

    private function buildHtml(): string
    {
        $name = $this->component->getAttribute('name');
        $content = $this->component->getConfig('content', '');
        $content_height = $this->component->getConfig('content_height');
        $scroll = $this->component->getConfig('scroll', true);

        $attributes = $this->component->getAttributes();
        unset($attributes['name']);
        $attributes['style'] = 'border: 1px solid #ccc;';

        $editor_attrs = ['id' => $this->ediotr_id . '-editor'];
        if ($content_height) {
            if ($scroll) {
                $editor_attrs['style'] = 'height: ' . $content_height . 'px;';
            } else {
                $editor_attrs['style'] = 'min-height: ' . $content_height . 'px;';
            }
        }

        $toolbar = $this->renderHtml('div', ['id' => $this->ediotr_id . '-toolbar']);
        $editor = $this->renderHtml('div', $editor_attrs);
        $textarea = $this->renderHtml('textarea', ['id' => $this->ediotr_id . '-content', 'name' => $name, 'style' => 'display: none;'], $content);

        return $this->renderHtml('div', $attributes, [$toolbar, $editor, $textarea]);
    }

    private function buildJavaScript(): void
    {
        $placeholder = $this->component->getConfig('placeholder', '');
        $scroll = $this->component->getConfig('scroll', true);
        $scroll = $scroll ? 'true' : 'false';

        $upload_image = $this->component->getConfig('upload_image');
        $upload_video = $this->component->getConfig('upload_video');
        $metas = $this->component->getConfig('metas');
        $headers = $this->component->getConfig('headers');
        $timeout = $this->component->getConfig('timeout', 15 * 10000);

        $menu = [];
        if ($upload_image) {
            $upload_image = [
                'server' => $upload_image['url'] ?? '',
                'fieldName' => $upload_image['field_name'] ?? '',
                'allowedFileTypes' => $upload_image['allowed_file_types'] ?? ['image/*'],
                'maxFileSize' => $upload_image['max_file_size'] ?? 1024 * 1024 * 10,
                'maxNumberOfFiles' => $upload_image['max_number_of_files'] ?? 100,
                'metas' => $metas,
                'headers' => $headers,
                'timeout' => $timeout,
            ];

            $menu['uploadImage'] = $this->arrayFilter($upload_image);
        }

        if ($upload_video) {
            $upload_video = [
                'server' => $upload_video['url'] ?? '',
                'fieldName' => $upload_video['field_name'] ?? '',
                'allowedFileTypes' => $upload_video['allowed_file_types'] ?? ['video/*'],
                'maxFileSize' => $upload_video['max_file_size'] ?? 1024 * 1024 * 10,
                'maxNumberOfFiles' => $upload_video['max_number_of_files'] ?? 100,
                'metas' => $metas,
                'headers' => $headers,
                'timeout' => $timeout,
            ];

            $menu['uploadVideo'] = $this->arrayFilter($upload_video);
        }

        $menu_json = 'MENU_CONF:' . $this->arrayToJavaScriptObject($menu, []);

        $js = "const { createEditor, createToolbar } = window.wangEditor
                const editorConfig = {
                    placeholder: '{$placeholder}',
                    scroll: {$scroll},
                    onChange(editor) {
                        const html = editor.getHtml()
                        console.log('editor content', html)
                        // 也可以同步到 <textarea>
                        document.getElementById('" . $this->ediotr_id . "-content').value = html;
                    },

                    {$menu_json}
                }

                const editor = createEditor({
                    selector: '#{$this->ediotr_id}-editor',
                    html: document.getElementById('" . $this->ediotr_id . "-content').value,
                    config: editorConfig,
                    mode: 'default', // or 'simple'
                })

                const toolbarConfig = {}

                const toolbar = createToolbar({
                    editor,
                    selector: '#{$this->ediotr_id}-toolbar',
                    config: toolbarConfig,
                    mode: 'default', // or 'simple'
                })
        ";

        PageRender::addJavaScriptCode($js);
    }

    /**
     * 格式化返回数据
     *
     * @author nece001@163.com
     * @create 2026-05-27 14:28:50
     *
     * @param string $url 图片 src ，必须
     * @param string $alt 图片描述文字，非必须
     * @param string $href 图片的链接，非必须
     * @return array
     */
    public static function formatSuccessData(string $url, string $alt = '', string $href = ''): array
    {
        $data = [
            'errno' => 0,
            'data' => [
                'url' => $url,
                'alt' => $alt,
                'href' => $href,
            ]
        ];

        return $data;
    }

    /**
     * 格式化返回数据
     *
     * @author nece001@163.com
     * @create 2026-05-27 14:29:55
     *
     * @param string $msg 错误信息，必须
     * @return array
     */
    public static function formatErrorData(string $msg): array
    {
        $data = [
            'errno' => 1,
            'msg' => $msg,
        ];

        return $data;
    }
}
