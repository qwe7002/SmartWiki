#简介
**smartwiki** 是一个简单的，基于文件的wiki 管理系统。wiki 采用 markdown 作为编辑语言。与同类产品相比，有着更高的性能。1MB 的PHP空间就可以搭建一个属于您的wiki系统。
#注意
以下信息需要根据需要修改。

* 您可以根据您的需要修改conf.php 中的<code>$filesetting</code>数组，该数组将为程序提供导航信息

<code>$filesetting=array ("index"=>"首页");</code>

其中的 index 为 md 文件的文件名。您必须编写一个index.md 文件作为网站的首页。

您可以选择使用一个数组来表示一个分类下的子分类。例如：

<pre>
	$filesetting=array("index"=>"首页",
	                   "about"=>array("标题"=>"关于","test1"=>"测试1","test2"=>"测试2"));
</pre>

其中的 about 代表这个分类的名称，所有该分类的md文件需要以<code>该分类名称_子分类名称.md</code>的方式来命名。子分类数组中必须包含一个名为标题的键来描述这个分类所要显示的名称。

* 在 md 中，您可以在首个分割线之前定义本页的标题与副标题。例如：

<pre>#标题

副标题

***</pre>

建议将以上代码写在文件的顶部，以便能够正确的解析到这些信息。

* 您可以通过修改 conf.php 文件的<code>$Gsetting</code>来指定该网站的名称以及页脚信息

#感谢
感谢优秀的开源 markdown 库 php-markdown以及优秀的前端框架 Bootstrap和 amazeui

* [php-markdown](https://github.com/michelf/php-markdown)
* [Bootstrap](https://github.com/twbs/bootstrap)
* [amazeui](https://github.com/allmobilize/amazeui/)


#参与开发
我们欢迎您在SmartWiki项目的GitHub上报告issue或者pull request。

如果您还不熟悉GitHub的Fork and Pull开发模式，您可以阅读GitHub的文档（https://help.github.com/articles/using-pull-requests）获得更多的信息。

如果你想在这里显示您的副本，请联系 Email：qwe7002@hotmail.com

#版权
采用MIT协议分发

>Copyright (C) <year> <copyright holders>

>Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

>The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

