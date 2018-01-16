var url=require('URl');
url.parse("//imooc.com:8000/course/list?form=scott&course=node#floor1",true,true);
url.resolve("http://imooc.com",'/course/index');//'http://imooc.com/course/index'


Microsoft Windows [版本 10.0.16299.125]
(c) 2017 Microsoft Corporation。保留所有权利。

         C:\Users\yangzhiwei>f:

         F:\>cd basic

         F:\basic>node server.js
         module.js:540
throw err;
^

Error: Cannot find module 'F:\basic\server.js'
at Function.Module._resolveFilename (module.js:538:15)
at Function.Module._load (module.js:468:25)
at Function.Module.runMain (module.js:684:10)
at startup (bootstrap_node.js:187:16)
at bootstrap_node.js:608:3

F:\basic>dir
驱动器 F 中的卷是 新加卷
卷的序列号是 084C-CF89

          F:\basic 的目录

2018/01/16  21:35    <DIR>          .
2018/01/16  21:35    <DIR>          ..
2018/01/16  19:44    <DIR>          .idea
2017/12/22  21:29    <DIR>          ams
2018/01/10  23:19    <DIR>          Classes
2017/12/27  21:36             1,224 client_socket.php
2017/12/22  21:29               164 common.php
2017/12/22  21:29               225 composer.json
2017/12/22  21:29             3,327 composer.lock
2018/01/10  23:19               452 config.php
2017/12/27  21:10               693 cookie.php
2017/12/22  21:52             2,186 db.php
2017/12/22  21:29               303 Demo.php
2018/01/10  23:19             2,344 excelDemo.php
2018/01/10  23:19             4,904 ExcelManage.php
2018/01/10  23:19             4,608 export.xls
2018/01/10  23:19             6,491 export.xlsx
2017/12/22  21:29               685 Factory.php
2017/12/27  21:10               245 filter.php
2017/12/27  21:10               525 http_test.php
2018/01/10  23:19               520 http_test1.php
2017/12/22  21:53             4,570 ImageCode.php
2017/12/27  21:10                23 imooc
2017/12/27  21:10             1,681 index.html
2018/01/10  23:19               115 index.php
2017/12/22  21:29               249 Linux.php
2017/12/22  21:29             1,710 loader.php
2017/12/22  21:29             1,586 mail.php
2018/01/16  21:39    <DIR>          node
2017/12/22  21:29               184 Operation.php
2017/12/22  21:29               279 OperationAdd.php
2017/12/22  21:29               279 OperationDiv.php
2017/12/22  21:29               279 OperationMul.php
2017/12/22  21:29               279 OperationSub.php
2017/12/27  21:10             1,721 pdo.php
2018/01/10  20:49    <DIR>          project
2017/12/22  21:29             6,160 QQMailer.php
2017/12/27  21:10             1,272 QRCode.php
2018/01/10  23:19             1,161 readExcel.php
2017/12/22  21:29                26 README.md
2017/12/27  21:10    <DIR>          redis
2017/12/27  21:10             1,483 server_socket.php
2018/01/16  19:48    <DIR>          shoppingCart
2018/01/10  23:19               101 shuiyin.php
2017/12/22  21:29               512 Son.php
2017/12/22  21:29             1,066 spl.php
2017/12/27  21:10             1,339 start.php
2017/12/27  21:10               607 tcp_test.php
2017/12/22  21:29    <DIR>          vendor
2017/12/27  21:10             1,117 websocket.php
2017/12/27  21:10    <DIR>          Workerman
2017/12/27  21:10            56,016 workerman-for-win-master.zip
2017/12/27  21:10               568 ws_test.php
42 个文件        113,279 字节
11 个目录 179,678,392,320 可用字节

                       F:\basic>cd node

                       F:\basic\node>dir
                       驱动器 F 中的卷是 新加卷
                       卷的序列号是 084C-CF89

                                 F:\basic\node 的目录

2018/01/16  21:39    <DIR>          .
2018/01/16  21:39    <DIR>          ..
2018/01/16  21:39               240 server.js
1 个文件            240 字节
2 个目录 179,678,392,320 可用字节

                      F:\basic\node>node server.js
                      Server running at http:127.0.0.1:1337/
^C
F:\basic\node>dir
驱动器 F 中的卷是 新加卷
卷的序列号是 084C-CF89

          F:\basic\node 的目录

2018/01/16  22:57    <DIR>          .
2018/01/16  22:57    <DIR>          ..
2018/01/16  22:55               264 class.js
2018/01/16  22:57                78 index.js
2018/01/16  21:39               240 server.js
2018/01/16  22:48                81 student.js
2018/01/16  22:49                81 teacher.js
5 个文件            744 字节
2 个目录 179,678,392,320 可用字节

                      F:\basic\node>node index.js
                      this issoctt
                      this isSoctt
                      this is白富美
                      this is高富帅

                      F:\basic\node>node index.js
                      this isSoctt
                      this is白富美
                      this is高富帅

                      F:\basic\node>node server.js
                      Server running at http:127.0.0.1:1337/
^C
F:\basic\node>node
> url
{ Url: [Function: Url],
    parse: [Function: urlParse],
    resolve: [Function: urlResolve],
    resolveObject: [Function: urlResolveObject],
    format: [Function: urlFormat],
    URL: [Function: URL],
    URLSearchParams: [Function: URLSearchParams],
    domainToASCII: [Function: domainToASCII],
    domainToUnicode: [Function: domainToUnicode] }
> url.parse('http://imooc.com/course/list')
Url {
    protocol: 'http:',
    slashes: true,
    auth: null,
    host: 'imooc.com',
    port: null,
    hostname: 'imooc.com',
    hash: null,
    search: null,
    query: null,
    pathname: '/course/list',
    path: '/course/list',
    href: 'http://imooc.com/course/list' }
> url.parse('http://imooc.com:8000/course/list')
Url {
    protocol: 'http:',
    slashes: true,
    auth: null,
    host: 'imooc.com:8000',
    port: '8000',
    hostname: 'imooc.com',
    hash: null,
    search: null,
    query: null,
    pathname: '/course/list',
    path: '/course/list',
    href: 'http://imooc.com:8000/course/list' }
> url.parse('http://imooc.com:8000/course/list?from=scott&course=node')
Url {
    protocol: 'http:',
    slashes: true,
    auth: null,
    host: 'imooc.com:8000',
    port: '8000',
    hostname: 'imooc.com',
    hash: null,
    search: '?from=scott&course=node',
    query: 'from=scott&course=node',
    pathname: '/course/list',
    path: '/course/list?from=scott&course=node',
    href: 'http://imooc.com:8000/course/list?from=scott&course=node' }
> url.format( {)
...   protocol: 'http:',
...   slashes: true,
...   auth: null,
...   host: 'imooc.com:8000',
...   port: '8000',
...   hostname: 'imooc.com',
...   hash: null,
...   search: '?from=scott&course=node',
...   query: 'from=scott&course=node',
...   pathname: '/course/list',
...   path: '/course/list?from=scott&course=node',
...   href: 'http://imooc.com:8000/course/list?from=scott&course=node' }
...   href: 'http://imooc.com:8000/course/list?from=scott&course=node' }
...
> url.format( {
...   protocol: 'http:',
...   slashes: true,
...   auth: null,
...   host: 'imooc.com:8000',
...   port: '8000',
...   hostname: 'imooc.com',
...   hash: null,
...   search: '?from=scott&course=node',
...   query: 'from=scott&course=node',
...   pathname: '/course/list',
...   path: '/course/list?from=scott&course=node',
...   href: 'http://imooc.com:8000/course/list?from=scott&course=node' })
'http://imooc.com:8000/course/list?from=scott&course=node'
> url.resolve("http://imooc.com','/course/index')
url.resolve("http://imooc.com','/course/index')
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^

SyntaxError: Invalid or unexpected token

> url.resolve("http://imooc.com",'/course/index')
'http://imooc.com/course/index'
> url.parse("http://imooc.com:8000/course/list?form=scott&course=node#floor1")
Url {
    protocol: 'http:',
    slashes: true,
    auth: null,
    host: 'imooc.com:8000',
    port: '8000',
    hostname: 'imooc.com',
    hash: '#floor1',
    search: '?form=scott&course=node',
    query: 'form=scott&course=node',
    pathname: '/course/list',
    >
    href: 'http://imooc.com:8000/course/list?form=scott&course=node#floor1' }
> url.parse("http://imooc.com:8000/course/list?form=scott&course=node#floor1",true)
Url {
protocol: 'http:',
slashes: true,
auth: null,
host: 'imooc.com:8000',
port: '8000',
hostname: 'imooc.com',
hash: '#floor1',
search: '?form=scott&course=node',
query: { form: 'scott', course: 'node' },
pathname: '/course/list',
path: '/course/list?form=scott&course=node',
href: 'http://imooc.com:8000/course/list?form=scott&course=node#floor1' }
> url.parse("http://imooc.com:8000/course/list?form=scott&course=node#floor1",true,true)
Url {
protocol: 'http:',
slashes: true,
auth: null,
host: 'imooc.com:8000',
port: '8000',
hostname: 'imooc.com',
hash: '#floor1',
search: '?form=scott&course=node',
query: { form: 'scott', course: 'node' },
pathname: '/course/list',
path: '/course/list?form=scott&course=node',
href: 'http://imooc.com:8000/course/list?form=scott&course=node#floor1' }
> url.parse("//imooc.com:8000/course/list?form=scott&course=node#floor1",true,true)
Url {
protocol: null,
slashes: true,
auth: null,
host: 'imooc.com:8000',
port: '8000',
hostname: 'imooc.com',
hash: '#floor1',
search: '?form=scott&course=node',
query: { form: 'scott', course: 'node' },
pathname: '/course/list',
path: '/course/list?form=scott&course=node',
href: '//imooc.com:8000/course/list?form=scott&course=node#floor1' }
> url.parse("//imooc.com:8000/course/list?form=scott&course=node#floor1",true,false)
Url {
protocol: null,
slashes: null,
auth: null,
host: null,
port: null,
hostname: null,
hash: '#floor1',
search: '?form=scott&course=node',
query: { form: 'scott', course: 'node' },
pathname: '//imooc.com:8000/course/list',
path: '//imooc.com:8000/course/list?form=scott&course=node',
href: '//imooc.com:8000/course/list?form=scott&course=node#floor1' }
> url.parse("//imooc.com:8000/course/list?form=scott&course=node#floor1",true,true)
Url {
protocol: null,
slashes: true,
auth: null,
host: 'imooc.com:8000',
port: '8000',
hostname: 'imooc.com',
hash: '#floor1',
search: '?form=scott&course=node',
query: { form: 'scott', course: 'node' },
pathname: '/course/list',
path: '/course/list?form=scott&course=node',
href: '//imooc.com:8000/course/list?form=scott&course=node#floor1' }
>