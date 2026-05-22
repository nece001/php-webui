# php-webui

PHP 的网页 UI 组件库，基于 Layui 框架实现。提供丰富的 UI 组件，支持面向对象方式构建网页界面。

## 特性

- 纯 PHP 代码构建 UI，无需编写 HTML
- 基于 Layui 2.x 框架
- 组件化设计，支持嵌套组合
- 支持表单、表格、导航、布局等多种组件

## 安装

```bash
composer require nece001/php-webui
composer require nece001/php-webui-layui
```

## 快速开始

### 创建页面

```php
use Nece\WebUi\Page;
use Nece\WebUi\Container;
use Nece\WebUi\Content;
use Nece\WebUi\Layui\PageRender;

// 创建页面
$page = new Page();
$page->setTitle('我的页面')
    ->setKeywords('关键词')
    ->setDescription('描述')
    ->addJavascriptUrl('//unpkg.com/layui@2.13.6/dist/layui.js')
    ->addStyleUrl('//unpkg.com/layui@2.13.6/dist/css/layui.css');

// 添加内容
$container = new Container();
$container->addChild(new Content('Hello, World!'));
$page->addChild($container);

// 渲染输出
$render = new PageRender($page);
return $render;
```

## 组件列表

### 布局组件

#### Container（容器）
```php
$container = new Container();
$container->setFluid(true); // 流式容器
```

#### Grid（网格布局）
```php
$grid = new Grid();
$grid->setSpace(20)
    ->addColumn((new GridColumn())->setXs(8)->addChild($content));
```

#### Panel（面板）
```php
$panel = new Panel();
$panel->addChild($content);
```

#### Card（卡片）
```php
$card = new Card();
$card->setTitle('卡片标题')->addChild($content);
```

### 表单组件

#### Form（表单）
```php
$form = new Form();
$form->setAction('/submit')->setMethod('post');
```

#### Input（输入框）
```php
// 普通输入框
$form->addChild((new Input())->setName('username')->setLabel('用户名'));

// 密码框
$form->addChild((new Input('password'))->setName('password')->setLabel('密码'));

// 日期选择
$form->addChild((new Input('date'))->setName('date')->setLabel('日期'));

// 文本域
$form->addChild((new Input('textarea'))->setName('content')->setLabel('内容'));
```

#### Select（选择框）
```php
$form->addChild((new Select())->setName('select')
    ->addOption(1, '选项1')
    ->addOption(2, '选项2', true)
    ->setSelectedValues([2]));
```

#### CheckBox（复选框）
```php
$form->addChild((new CheckBox())->setName('checkbox')
    ->addOption(1, '选项1')
    ->addOption(2, '选项2')
    ->setCheckedValues([1, 2]));
```

#### Radio（单选框）
```php
$form->addChild((new Radio())->setName('radio')
    ->addOption(1, '选项1')
    ->addOption(2, '选项2')
    ->setCheckedValue(1));
```

### 按钮组件

#### Button（按钮）
```php
$button = new Button();
$button->addChild(new Content('点击我'))
    ->setSize('sm')
    ->setBgColor('blue');
```

#### ButtonGroup（按钮组）
```php
$buttonGroup = new ButtonGroup();
$buttonGroup->addChild((new Button())->addChild(new Content('按钮1')))
    ->addChild((new Button())->addChild(new Content('按钮2')));
```

### 导航组件

#### Nav（导航）
```php
$nav = new Nav();
$nav->addChild((new Nav())->setText('首页')->setLink('/'))
    ->addChild((new Nav())->setText('用户管理')->setLink('/user'));
```

#### Tab（标签页）
```php
$tab = new Tab();
$tab->addChild((new TabItem())->setLabel('标签1')->addChild(new Content('内容1')))
    ->addChild((new TabItem())->setLabel('标签2')->addChild(new Content('内容2')));
```

#### Collapse（折叠面板）
```php
$collapse = new Collapse();
$collapse->addChild((new CollapseItem())->setTitle('折叠项')->addChild(new Content('内容')));
```

#### BreadCrumb（面包屑）
```php
$breadCrumb = new BreadCrumb();
$breadCrumb->addLink('/', '首页')
    ->addLink('/user', '用户管理')
    ->addLink('/user/1', '用户详情');
```

### 数据展示组件

#### DataGrid（数据表格）
```php
$dataGrid = new DataGrid();
$dataGrid->setDataUrl('/data')
    ->setToolbar();

$dataGrid->addColumns()
    ->addColumn((new DataGridColumn())->setTitle('ID')->setField('id'))
    ->addColumn((new DataGridColumn())->setTitle('名称')->setField('name'));
```

#### Tree（树形结构）
```php
$tree = new Tree();
$tree->setData([
    [
        'title' => '节点1',
        'id' => 1,
        'children' => [
            ['title' => '子节点', 'id' => 11]
        ]
    ]
])->setShowCheckbox();
```

#### Timeline（时间线）
```php
$timeline = new Timeline();
$timeline->addChild((new TimelineItem())->setTime('2024-01-01')->addChild(new Content('事件1')));
```

#### Progress（进度条）
```php
$progress = new Progress();
$progress->setCurrent(50)->setTotal(100)->setShowPercent(true);
```

### 其他组件

#### Badge（徽章）
```php
$badge = new Badge();
$badge->setText('new');
```

#### Code（代码块）
```php
$code = new Code();
$code->setCode('echo "Hello";')->setLang('php');
```

#### Pagination（分页）
```php
$pagination = new Pagination();
$pagination->setPage(1)->setTotal(1000)->setPageSizeOptions([10, 20, 30]);
```

#### Uploader（上传）
```php
// 单文件上传
$single = new UploaderSingle();
$single->setButtonText('选择文件')
    ->setUploadUrl('/upload')
    ->setPreview();

// 多文件上传
$multiple = new UploaderMultiple();
$multiple->setButtonText('选择多个文件')
    ->setUploadUrl('/uploads');
```

#### Carousel（轮播）
```php
$carousel = new Carousel();
$carousel->setWidth('100%')->setHeight('400px')
    ->addChild(new Content('轮播项1'))
    ->addChild(new Content('轮播项2'));
```

#### Dropdown（下拉菜单）
```php
$dropdown = new Dropdown();
$dropdown->addChild((new Button())->addChild(new Content('菜单')))
    ->setData([
        ['title' => '选项1', 'id' => 1],
        ['title' => '选项2', 'id' => 2]
    ]);
```

#### Transfer（穿梭框）
```php
$transfer = new Transfer();
$transfer->setTitle('选择项目')
    ->addData('项目1', '1')
    ->addData('项目2', '2')
    ->setShowSearch();
```

#### Slider（滑块）
```php
$slider = new Slider();
$slider->setValue(50)->setMin(0)->setMax(100);
```

#### Rate（评分）
```php
$rate = new Rate();
$rate->setLength(5)->setValue(3)->setHalf(true);
```

#### Fixbar（固定栏）
```php
$fixbar = new Fixbar();
$fixbar->addBar('share', 'layui-icon-share');
```

## Action（动作）

Action 用于定义按钮的交互行为。

```php
$action = new Action();
$action->setUrl('/api/delete')
    ->setMethod('POST')
    ->setOpenConfirm('确认删除吗？')
    ->setData(['id' => 1]);

$button = new Button();
$button->setAction($action);
```

### Action 方法

| 方法 | 说明 |
|------|------|
| `setUrl($url)` | 设置请求 URL |
| `setMethod($method)` | 设置请求方法 GET/POST |
| `setData($data)` | 设置请求数据 |
| `setOpenConfirm($text)` | 设置确认弹窗 |
| `setOpenForm($title)` | 设置表单弹窗 |
| `setSubmitAction($action)` | 设置表单提交后的动作 |
| `setIsJson($bool)` | 是否 JSON 响应 |

## 组件嵌套

组件支持嵌套组合：

```php
$card = new Card();
$card->setTitle('卡片')
    ->addChild((new Tab())
        ->addChild((new TabItem())->setLabel('标签1')->addChild(new Content('内容'))));
```

## 渲染输出

所有组件通过 `PageRender` 渲染：

```php
$render = new PageRender($page);
return $render;
```

## 许可证

MIT