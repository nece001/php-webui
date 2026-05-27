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
$form->setAction('/submit')
    ->setMethod('post')
    ->setInlineLayout()
    ->addCss('padding:10px');

// 设置按钮
$form->setButtons([
    (new Button('submit'))->addChild(new Icon('search'))->addChild(new Content('查询'))->setSize('sm'),
    (new Button('reset'))->addChild(new Icon('refresh'))->addChild(new Content('重置'))->setSize('sm'),
], 'center');
```

#### Input（输入框）
```php
// 普通输入框
$form->addChild((new Input())->setName('username')->setLabel('用户名'));

// 密码框
$form->addChild((new Input('password'))->setName('password')->setLabel('密码')->setAffix('eye'));

// 日期选择
$form->addChild((new Input('date'))->setName('date')->setLabel('日期'));

// 文本域
$form->addChild((new Input('textarea'))->setName('content')->setLabel('内容'));

// 带验证的输入框
$form->addChild((new Input())->setName('email')->setLabel('邮箱')
    ->setAffix('clear')
    ->setValidate(['required', 'email'])
    ->setAutocomplete(false));

// 带附加内容的输入框
$captcha = new Content('<img src="/captcha">');
$form->addChild((new Input())->setName('code')->setLabel('验证码')->setAppend($captcha));
```

#### Select（选择框）
```php
$select = new Select();
$select->setName('role')
    ->setLabel('角色')
    ->addOption('', '请选择')
    ->addOption(1, '管理员')
    ->addOption(2, '普通用户', true) // true 表示禁用
    ->setSelectedValues([1]);
$form->addChild($select);
```

#### CheckBox（复选框）
```php
// 普通复选框
$form->addChild((new CheckBox())->setName('checkbox')
    ->addOption(1, '选项1')
    ->addOption(2, '选项2')
    ->setCheckedValues([1, 2]));

// 开关模式
$form->addChild((new CheckBox())->setName('is_menu')
    ->setLabel('是否菜单')
    ->addOption(1, '是')
    ->setCheckedValues([1])
    ->setSwitch());
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
$button->addChild(new Icon('search'))
    ->addChild(new Content('查询'))
    ->setSize('sm')
    ->setBgColor('blue')
    ->setBorderColor('green')
    ->setFluid()
    ->setAction($action);

// 链接按钮
$button = new Button('link');
$button->setUrl('/user/{id}')->setTitle('查看详情');
```

#### Icon（图标）
```php
$icon = new Icon('search'); // 图标名称
$button->addChild($icon);
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

#### NavTree（树形导航）
```php
$menu = new NavTree();
$menu->addItem(new NavItem(1, 0, '/admin', '首页', 'home'));
$menu->addItem(new NavItem(2, 1, '/admin/user', '用户管理', 'user'));
$menu->addItem(new NavItem(3, 1, '/admin/role', '角色管理', 'role'));

// 获取根节点
$root = $menu->getRootItem();
```

#### NavItem（导航项）
```php
$item = new NavItem($id, $parent_id, $url, $title, $icon, $avatar = '', $badge = '', $target = '');
```

#### AdminFrame（管理后台框架）
```php
$adminFrame = new AdminFrame();
$adminFrame->setLogoImage($logoUrl)
    ->setLogoText('管理系统')
    ->setAvatarRoot($avatarNavTree->getRootItem())
    ->setMenuRoot($menuNavTree->getRootItem())
    ->setDefaultUrl('/admin/dashboard')
    ->setFooterContent('© 2024 管理系统');
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
    ->setCheckboxColumn()
    ->setPagination()
    ->setExportUrl('/export');

// 添加列
$dataGrid->addColumns()
    ->addColumn((new DataGridColumn())->setTitle('ID')->setField('id')->setPrimaryKey()->setWidth(80)->setFixed('left'))
    ->addColumn((new DataGridColumn())->setTitle('名称')->setField('name'))
    ->addColumn((new DataGridColumn())->setTitle('状态')->setField('status')->setAlign('center')
        ->setSwitch('是|否', (new Action())->setUrl('/update')->setMethod('POST')->setIsJson())
    )
    ->addOperationColumn((new DataGridColumn())->setTitle('操作')->setWidth(200));

// 添加工具按钮
$dataGrid->addTool(
    (new Button())->addChild(new Icon('add-1'))->setSize('xs')->setAction(
        (new Action('add'))->setUrl('/add')->setOpenForm('添加')
            ->setSubmitAction((new Action('save'))->setUrl('/save')->setMethod('POST')->setIsJson())
    )
);

// 添加操作按钮
$dataGrid->addOperation(
    (new Button())->addChild(new Icon('edit'))->setSize('xs')
        ->setAction((new Action('edit'))->setUrl('/edit')->setOpenForm('编辑'))
)->addOperation(
    (new Button())->addChild(new Icon('del'))->setSize('xs')
        ->setAction((new Action('del'))->setUrl('/del')->setOpenForm('删除'))
        , '{is_disabled==0}' // 模板条件，判断操作按钮是否显示
);
```

#### DataGridColumn（表格列）
```php
$column = new DataGridColumn();
$column->setField('id')
    ->setTitle('ID')
    ->setWidth(80)
    ->setAlign('center')
    ->setFixed('left')
    ->setPrimaryKey()
    ->setSwitch('是|否', $action); // 开关列
```

#### TreeDataGrid（树形数据表格）
```php
$tree = new TreeDataGrid();
$tree->setDataUrl('/tree-data')
    ->setCheckboxColumn()
    ->setPagination()
    ->setCustomNameField('title')
    ->setCustomPidField('parent_id')
    ->setCustomIsParentField('is_parent')
    ->setAsync(true)
    ->setAsyncUrl('/tree-data')
    ->setAsyncParams(['parent_id=id']);
```

#### Tree（树形结构）
```php
$tree = new Tree();
$tree->setData($data)
    ->setName('permission')
    ->setShowLine()
    ->setOnlyIconControl()
    ->setAccordion()
    ->setShowCheckbox();
```

#### TreeNode（树节点）
```php
$root = new TreeNode(0, '根节点');
$root->addChild(new TreeNode(1, '节点1', true)); // true 表示选中
$data = $root->toArray();
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
$transfer->setTitle('可分配', '已分配')
    ->setFieldName('role_ids')
    ->addData('角色1', '1')
    ->addData('角色2', '2')
    ->setCheckedValues([1])
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
| `setBindId($id)` | 绑定表单元素 ID |
| `setParamName($name)` | 设置参数名称 |

### Action 高级用法

```php
// 打开表单弹窗并设置提交动作
$action = new Action('add');
$action->setUrl('/admin/user/add')
    ->setOpenForm('添加用户')
    ->setSubmitAction(
        (new Action('save'))->setUrl('/admin/user/save')->setMethod('POST')->setIsJson()
    );

// 删除确认弹窗
$action = new Action('delete');
$action->setUrl('/admin/user/delete')
    ->setOpenConfirm('确认删除吗？')
    ->setMethod('POST')
    ->setIsJson()
    ->setParamName('ids');
```

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