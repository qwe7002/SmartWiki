#简介
**smartwiki** 是一个简单的，基于文件的wiki 管理系统。wiki 采用 markdown 作为编辑语言。与同类产品相比，有着更高的性能。仅由12个文件组成。只要您有300k 的PHP空间就可以搭建一个属于您的wiki系统。
#注意
以下信息需要根据需要修改。
* 您可以根据您的需要修改conf.php 中的<code>$filesetting</code>数组，该数组将为程序提供导航信息

>$filesetting=array ("index"=>"首页");

其中的 index 为 md 文件的文件名。您必须编写一个index.md 文件作为网站的首页。在 md 中，您可以在首个分割线之前定义本页的标题与副标题。例如：
<code>#标题

副标题

***
</code>
建议将以上代码写在文件的顶部，以便能够正确的解析到这些信息。
* 您可以通过修改 conf.php 文件的<code>$Gsetting</code>来指定该网站的名称以及页脚信息

#感谢
感谢优秀的开源 markdown 库 php-markdown以及优秀的前端框架 Bootstrap

* [php-markdown](https://github.com/michelf/php-markdown)
* [Bootstrap](https://github.com/twbs/bootstrap)

#版权
采用MIT协议分发

>Copyright (C) <year> <copyright holders>

>Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

>The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

>THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.

