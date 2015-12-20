![logo](http://static.oschina.net/uploads/space/2015/0410/192411_CgHK_1028150.jpg)

### Thinker-md是什么

Thinker-md是一个支持markdown的在线文档编辑器，在线演示：http://thinkermd.oschina.mopaas.com/produce.html

### Thinker-md的特性

- 支持Markdown标准和Github风格；
- 编辑内容实时保存，刷新页面不会丢失；
- 支持实时预览、图片（跨域）上传；
- 支持MarkdownToHtml,HtmlToMarkdown双向解析；
- 支持emoji表情；
- 多语言语法高亮；
- 可全屏可缩小，全屏编辑体验佳；
- 国际化支持；
- 极致的在线代码编写体验

### Thinker-md的由来

在开发`Team@OSC`的过程中，一直在寻找一款好用的Markdown编辑器，纵观所有开源的Markdown编辑器，要么就是外观简陋，要么就是集成繁琐，最终找了一款比较符合要求的产品[https://github.com/toopay/bootstrap-markdown](https://github.com/toopay/bootstrap-markdown) ,但由于在使用过程中仍然遇到一些不够完善的地方，于是我们决定自己开发完善一个，并且开源出来，方便大家。

### License

The MIT License.

Copyright (c) 2015 Oschina.net

### 我们正在用

`Team@OSC` , `Git@OSC`


# 1. 开发者指南

### 1.1 安装Grunt插件
参考:
    [Nodejs 文档](https://nodejs.org/documentation/)
    [Grunt 中文社区](http://www.gruntjs.org/)

进入thinker-md根目录，执行如下命令：
```Nodejs
npm install
```

### 1.2 编译
```Nodejs
grunt watch
```
编译后会生成如下目录

dist

----javascript

----|----user

----|----|----thinker-md-user.js

----|----|----thinker-md-user.min.js

----|----|----thinker-md-user.min.map

----|----vendor

----|----|----jquery-2.1.3.js

----|----|----thinker-md.js

----|----|----thinker-md.min.js

----|----|----thinker-md.min.map

----stylesheets

----|----fonts

----|----|----fontawesome-webfont.eot

----|----|----glyphicons-halflings-regular.eot

----|----|----...

----|----img

----|----user

----|----|----thinker-md.user.min.css

----|----vendor

----|----|----thinker-md.min.css


# 2. 用户指南

> thinker-md 依赖jquery库。推荐使用最新版jquery 1.x或者2.x

### 页面引入
_参照/view/index.html和/view/develop.html_
- index.html默认引用编译之后的js和css资源。
- 如果需要定制thinker-md，你需要按照 **开发者指南** 步骤执行命令，切换到develop.html。所有资源的修改会自动生成到dist目录下。

# 3. 使用

### 3.1 使用案例
```html
<!DOCTYPE html>
<html>
<head lang="zh">
    <meta charset="UTF-8">
    <title>Thinker-md</title>
</head>
<body>
    <textarea id="md" data-provide="markdown"></textarea>
<link href="../dist/stylesheets/user/thinker-md.user.min.css" rel="stylesheet">
<link href="../dist/stylesheets/vendor/thinker-md.min.css" rel="stylesheet">
<script src="../dist/javascripts/vendor/jquery-2.1.3.js" type="text/javascript"></script>
<script src="../dist/javascripts/vendor/thinker-md.js" type="text/javascript"></script>
<script>
    $("#md").markdown({
    language: 'zh',
    fullscreen: {
        enable: true
    },
    resize:'vertical',
    localStorage:'md',
    imgurl: 'http://192.168.1.142:8080/upload',
    base64url: 'http://192.168.1.142:8080/base64'
});
</script>
</body>
</html>
```



### 3.2 配置参数说明
|参数名称|类型|说明|
|:----| :---- | :----|
|`autofocus`|`boolean`|编辑器初始后是否默认获取焦点。 默认 `false`|
|`savable`|`boolean`|编辑器是否显示并激活保存按钮。 默认 `false`|
|`hideable`|`boolean`|如果设置 `true` ，编辑器在 `blur` 事件后自动隐藏。 默认 `false`|
|`width`|`mixed`|编辑器宽度。 默认 `inherit` 支持数字类型 (在`css`充许范围), 或bootstrap样式 (如 `span2`)|
|`height`|`mixed`|编辑器高度。 默认 `inherit`|
|`resize`|`string`|禁用或改变 `resize` 属性, 可能的值 `none`,`both`,`horizontal`,`vertical`。 默认 `none` 如果此属性未被禁止, 用户可以预览时改变编辑器高度。|
|`language`|`string`|本地语言设置。 默认 `zh`|
|`footer`|`mixed`|编辑器底部栏. 可能的值 `string`,`callback`。 默认为空|
|`fullscreen`|`object`| `enable` (`bool`)|
|`hiddenButtons`|`mixed`|按钮名字数组或字符串。 默认为空字符串|
|`disabledButtons`|`mixed`|按钮名字数组或字符串。 默认为空字符串|
|`localStorage`|`string`|HTML5本地存储，全局唯一|
|`imgurl`|`url`|图像上传地址|
|`base64url`|`url`|base64编码格式图像上传地址|

### 3.2.1 java版上传代码实现

普通图像上传案例
```java
package net.oschina.servlet;

import org.apache.commons.fileupload.FileItem;
import org.apache.commons.fileupload.FileItemFactory;
import org.apache.commons.fileupload.FileUploadException;
import org.apache.commons.fileupload.disk.DiskFileItemFactory;
import org.apache.commons.fileupload.servlet.ServletFileUpload;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebInitParam;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import java.io.File;
import java.io.IOException;
import java.io.OutputStream;
import java.util.Iterator;

/**
 * Created by ling on 2014/11/11.
 */
@WebServlet(name = "upload", urlPatterns = "/upload", initParams = {@WebInitParam(name = "upload_path", value = "\\ImageDir")})
public class UploadServlet extends javax.servlet.http.HttpServlet {

    @Override
    protected void doOptions(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        resp.addHeader("Access-Control-Allow-Origin", "*");
        resp.addHeader("Access-Control-Allow-Methods", "GET,POST,OPTIONS");
        resp.addHeader("Access-Control-Allow-Headers", "Cache-Control,X-Requested-With,Content-Type");
        super.doOptions(req,resp);
    }


    @Override
    protected void doGet(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        this.doPost(req, resp);
    }

    @Override
    protected void doPost(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        req.setCharacterEncoding("UTF-8");
        boolean isMultipart = ServletFileUpload.isMultipartContent(req);
        if (isMultipart) {
            FileItemFactory fileItemFactory = new DiskFileItemFactory();
            ServletFileUpload servletFileUpload = new ServletFileUpload(fileItemFactory);

            Iterator<FileItem> items;

            try {
                items = servletFileUpload.parseRequest(req).iterator();
                while (items.hasNext()) {
                    FileItem item = items.next();
                    if (!item.isFormField()) {
                        //文件名称
                        String name = item.getName();
                        String fileName = name.substring(name.lastIndexOf('\\') + 1, name.length());
                        String directory = req.getSession().getServletContext().getRealPath("/ImageDir");

                        StringBuilder path = new StringBuilder();
                        path.append(directory);
                        path.append(File.separator);
                        path.append(fileName);

                        //上传文件
                        File file = new File(path.toString());
                        File dir = file.getParentFile();
                        if (!dir.exists() && !dir.isDirectory()) {
                            dir.mkdir();
                        }
                        item.write(file);


                        StringBuilder imgUrl = new StringBuilder("http://localhost:8080/ImageDir/");
                        imgUrl.append(fileName);

                        resp.addHeader("Access-Control-Allow-Origin", "*");
                        resp.setContentType("text/json; charset=UTF-8");
                        OutputStream outputStream = resp.getOutputStream();
                        outputStream.write(imgUrl.toString().getBytes("UTF-8"));

                        outputStream.flush();
                        outputStream.close();
                    }
                }
            } catch (FileUploadException e) {
                e.printStackTrace();
            } catch (Exception e) {
                e.printStackTrace();
            }
        }
    }
}
```

base64图像上传案例
```java
package net.oschina.servlet;

import javax.servlet.ServletException;
import javax.servlet.annotation.MultipartConfig;
import javax.servlet.annotation.WebInitParam;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.Part;
import java.io.*;
import java.util.Base64;
import java.util.Date;

/**
 * Created by ling on 2015/3/16.
 */
@WebServlet(name = "base64", urlPatterns = "/base64", initParams = {@WebInitParam(name = "upload_path", value = "\\ImageDir")})
@MultipartConfig(fileSizeThreshold = 1024 * 1024 * 2, // 2MB
        maxFileSize = 1024 * 1024 * 10,      // 10MB
        maxRequestSize = 1024 * 1024 * 50)   // 50MB
public class Base64Servlet extends HttpServlet {
    @Override
    protected void doOptions(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        resp.addHeader("Access-Control-Allow-Origin", "*");
        resp.addHeader("Access-Control-Allow-Methods", "GET,POST,OPTIONS");
        resp.addHeader("Access-Control-Allow-Headers", "Cache-Control,X-Requested-With,Content-Type");
        super.doOptions(req, resp);
    }

    protected void doPost(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
        req.setCharacterEncoding("UTF-8");
        resp.addHeader("Access-Control-Allow-Origin", "*");
        resp.setContentType("text/json; charset=UTF-8");
        OutputStream outputStream = resp.getOutputStream();
        //文件名称
        String fileName = new Date().getTime() + ".png";
        String directory = req.getSession().getServletContext().getRealPath("/ImageDir");
        StringBuilder path = new StringBuilder();
        path.append(directory);
        path.append(File.separator);
        path.append(fileName);
        for (Part part : req.getParts()) {
            StringBuilder base64Data = new StringBuilder();
            Reader reader = new InputStreamReader(part.getInputStream(), "UTF-8");
            char[] buffer = new char[1024];
            int read;
            while ((read = reader.read(buffer)) != -1) {
                base64Data.append(buffer, 0, read);
            }
            reader.close();
            String base64 = base64Data.toString();
            if (null != base64 && !"".equals(base64.trim())) {
                base64 = base64.substring(base64.lastIndexOf(',') + 1);
                byte[] b = Base64.getDecoder().decode(base64.getBytes());
                BufferedOutputStream bos;
                FileOutputStream fos;
                File file = new File(path.toString());
                fos = new FileOutputStream(file);
                bos = new BufferedOutputStream(fos);
                bos.write(b);
                fos.flush();
                fos.close();
                bos.flush();
                bos.close();
                StringBuilder imgUrl = new StringBuilder("http://localhost:8080/ImageDir/");
                imgUrl.append(fileName);
                outputStream.write(imgUrl.toString().getBytes("UTF-8"));
            }
        }

        outputStream.flush();
        outputStream.close();

    }

    protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
        this.doPost(request, response);
    }
}
```