#首页
SmartWiki 是一个简单的，基于文件的 Wiki 管理系统。
***
## 简介
**SmartWiki** 是一个简单的，基于文件的 CMS 系统。SmartWiki 采用 Markdown 作为编辑语言，无需任何数据库。与同类产品相比，有着更高的性能。只要您拥有1MB 的PHP虚拟主机空间就可以搭建一个 CMS 系统。(本系统运行于 Raspberry Pi B+上)

## 注意
以下信息需要根据需要修改。
* 您需要更改 config.php 中的 $Config 数组，该数组的 Title 为网站标题，FooterInfo 为页脚信息。我们希望您能保留'Powered by SmartWiki.'字样以证明您在自豪的使用 Smartwiki 建立网站。

* 您可以根据您的需要修改 config.php 中的 `$Pages` 数组，该数组将为程序提供导航信息

`$Pages = array ('index' => '首页');`

其中的 index 为 md 文件的文件名。您必须编写一个 `index.md` 文件作为网站的首页。

您可以选择使用一个数组来表示一个分类下的子分类。例如：

```
$Pages = array('index' => '首页',
                'about' => array(
                  'Title' => '关于',
                  'test'  => '测试'
                )
              );
```

其中的 `about` 代表这个分类的名称，所有该分类的md文件需要以 `分类名称（例如 about）/子分类名称（例如 test）.md`的方式来存放。子分类数组中必须包含一个名为标题的键来描述这个分类所要显示的名称。

* 在 md 中，您可以在首个分割线之前定义本页的标题与副标题。例如：

```
#标题
副标题
***
```

建议将以上代码写在文件的顶部，以便能够正确的解析到这些信息。

* 您可以通过修改 config.php 文件的 `$Config` 来指定该网站的名称以及页脚信息

## 感谢
感谢优秀的开源 Markdown 库 `php-markdown` 以及优秀的前端框架 `Bootstrap` 和 `AmazeUI`.

* [php-markdown](https://github.com/michelf/php-markdown)
* [Bootstrap](https://github.com/twbs/bootstrap)
* [amazeui](https://github.com/allmobilize/amazeui/)


## 参与开发
我们欢迎您在 SmartWiki 项目的 GitHub 上报告 issue 或者 pull request。

如果您还不熟悉GitHub的Fork and Pull开发模式，您可以阅读GitHub的文档（https://help.github.com/articles/using-pull-requests）获得更多的信息。

如果你想在这里显示您的副本，请联系 Email：qwe7002@hotmail.com

感谢 [@Rakume](https://github.com/kunr) 同学的优化。

## 版权
采用MIT协议分发

>Copyright (C) <year> <copyright holders>

>Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

>The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.