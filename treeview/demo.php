<link href="https://cdn.bootcss.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link href="http://www.jq22.com/demo/bootstrap-treeview201711240023/js/zx.css" rel="stylesheet">
<script language="javascript" type="text/javascript" src="http://www.jq22.com/demo/bootstrap-treeview201711240023/35ff706fd57d11c141cdefcd58d6562b.js" charset="gb2312"></script>
<style>
    .folder{
        background: url(http://static.runoob.com/assets/js/jquery-treeview/images/folder.gif) 0 0 no-repeat;
    }
</style>
<div class="box">
    <div class="row">
        <hr>
        <div class="col-xs-12 col-sm-12">
            <h2 class="text-center text-bold">小说日志管理列表</h2>
            <div id="treeview-checkable" class="treeview">
            </div>
        </div>
    </div>
</div>
<script src="http://www.jq22.com/demo/bootstrap-treeview201711240023/js/jquery-2.1.0.min.js"></script>
<script src="http://www.jq22.com/demo/bootstrap-treeview201711240023/js/bootstrap-treeview.js"></script>
<script type="text/javascript">

    var defaultData = [
        {
            "permission_id": 1,
            "parent_permission_id": 0,
            "text": "系统管理",
            "permission_url": "",
            "tag": "",
            "small_icon_name": "fa fa-desktop",
            "level": 0,
            "nodes": [
                {
                    "permission_id": 2,
                    "parent_permission_id": 1,
                    "text": "权限管理",
                    "permission_url": "",
                    "tag": "",
                    "small_icon_name": "fa fa-sitemap",
                    "level": 1,
                    "nodes": [
                        {
                            "permission_id": 7,
                            "parent_permission_id": 2,
                            "text": "权限列表",
                            "permission_url": "permission/permission_list",
                            "tag": "",
                            "small_icon_name": "fa fa-list",
                            "level": 2,
                            "tags": 0,
                            "after_html": "<span class=\"button_z\"><button type=\"button\" class=\"btn btn btn-info btn-xs\" onclick=\"edit(7);\">编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"del(7);\">删除</button></span>"
                        },
                    ],
                    "tags": 5,
                    "after_html": "<span class=\"button_z\"><button type=\"button\" class=\"btn btn btn-info btn-xs\" onclick=\"edit(2);\">编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"del(2);\">删除</button></span>"
                },
                {
                    "permission_id": 21,
                    "parent_permission_id": 1,
                    "text": "系统权限分组管理",
                    "permission_url": "",
                    "tag": "",
                    "small_icon_name": "fa fa-object-group",
                    "level": 1,
                    "nodes": [
                        {
                            "permission_id": 22,
                            "parent_permission_id": 21,
                            "text": "系统分组列表",
                            "permission_url": "group/group_list",
                            "tag": "",
                            "small_icon_name": "fa fa-list",
                            "level": 2,
                            "tags": 0,
                            "after_html": "<span class=\"button_z\"><button type=\"button\" class=\"btn btn btn-info btn-xs\" onclick=\"edit(22);\">编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"del(22);\">删除</button></span>"
                        },
                    ],
                    "tags": 7,
                    "after_html": "<span class=\"button_z\"><button type=\"button\" class=\"btn btn btn-info btn-xs\" onclick=\"edit(21);\">编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"del(21);\">删除</button></span>"
                },
                {
                    "permission_id": 29,
                    "parent_permission_id": 1,
                    "text": "系统用户管理",
                    "permission_url": "",
                    "tag": "",
                    "small_icon_name": "fa fa-user",
                    "level": 1,
                    "nodes": [
                        {
                            "permission_id": 30,
                            "parent_permission_id": 29,
                            "text": "系统用户列表",
                            "permission_url": "admin/admin_list",
                            "tag": "",
                            "small_icon_name": "fa fa-list",
                            "level": 2,
                            "tags": 0,
                            "after_html": "<span class=\"button_z\"><button type=\"button\" class=\"btn btn btn-info btn-xs\" onclick=\"edit(30);\">编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"del(30);\">删除</button></span>"
                        },
                    ],
                    "tags": 6,
                    "after_html": "<span class=\"button_z\"><button type=\"button\" class=\"btn btn btn-info btn-xs\" onclick=\"edit(29);\">编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"del(29);\">删除</button></span>"
                }
            ],
            "tags": 3,
            "after_html": "<span class=\"button_z\"><button type=\"button\" class=\"btn btn btn-info btn-xs\" onclick=\"edit(1);\">编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"del(1);\">删除</button></span>"
        },
        {
            "permission_id": 4,
            "parent_permission_id": 0,
            "text": "新闻管理中心",
            "permission_url": "",
            "tag": "",
            "small_icon_name": "fa fa-newspaper-o",
            "level": 0,
            "nodes": [
                {
                    "permission_id": 5,
                    "parent_permission_id": 4,
                    "text": "新闻管理",
                    "permission_url": "",
                    "tag": "",
                    "small_icon_name": "fa fa-list-alt",
                    "level": 1,
                    "nodes": [
                        {
                            "permission_id": 8,
                            "parent_permission_id": 5,
                            "text": "新闻分类管理",
                            "permission_url": "news/news_category",
                            "tag": "",
                            "small_icon_name": "fa fa-book",
                            "level": 2,
                            "tags": 0,
                            "after_html": "<span class=\"button_z\"><button type=\"button\" class=\"btn btn btn-info btn-xs\" onclick=\"edit(8);\">编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"del(8);\">删除</button></span>"
                        },
                    ],
                    "tags": 4,
                    "after_html": "<span class=\"button_z\"><button type=\"button\" class=\"btn btn btn-info btn-xs\" onclick=\"edit(5);\">编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"del(5);\">删除</button></span>"
                }
            ],
            "tags": 1,
            "after_html": "<span class=\"button_z\"><button type=\"button\" class=\"btn btn btn-info btn-xs\" onclick=\"edit(4);\">编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"del(4);\">删除</button></span>"
        },
        {
            "permission_id": 48,
            "parent_permission_id": 0,
            "text": "电商管理中心",
            "permission_url": "",
            "tag": "",
            "small_icon_name": "fa fa-shopping-cart",
            "level": 0,
            "nodes": [
                {
                    "permission_id": 51,
                    "parent_permission_id": 48,
                    "text": "反馈管理",
                    "permission_url": "",
                    "tag": "",
                    "small_icon_name": "fa fa-paperclip",
                    "level": 1,
                    "nodes": [
                        {
                            "permission_id": 52,
                            "parent_permission_id": 51,
                            "text": "反馈列表",
                            "permission_url": "feedback/feedback_list",
                            "tag": "",
                            "small_icon_name": "fa fa-list",
                            "level": 2,
                            "tags": 0,
                            "after_html": "<span class=\"button_z\"><button type=\"button\" class=\"btn btn btn-info btn-xs\" onclick=\"edit(52);\">编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"del(52);\">删除</button></span>"
                        }
                    ],
                    "tags": 1,
                    "after_html": "<span class=\"button_z\"><button type=\"button\" class=\"btn btn btn-info btn-xs\" onclick=\"edit(51);\">编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"del(51);\">删除</button></span>"
                },
                {
                    "permission_id": 54,
                    "parent_permission_id": 48,
                    "text": "商品管理",
                    "permission_url": "",
                    "tag": "",
                    "small_icon_name": "fa fa-codepen",
                    "level": 1,
                    "nodes": [
                        {
                            "permission_id": 55,
                            "parent_permission_id": 54,
                            "text": "商品列表",
                            "permission_url": "goods/goods_list",
                            "tag": "",
                            "small_icon_name": "fa fa-list",
                            "level": 2,
                            "tags": 0,
                            "after_html": "<span class=\"button_z\"><button type=\"button\" class=\"btn btn btn-info btn-xs\" onclick=\"edit(55);\">编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"del(55);\">删除</button></span>"
                        },
                    ],
                    "tags": 2,
                    "after_html": "<span class=\"button_z\"><button type=\"button\" class=\"btn btn btn-info btn-xs\" onclick=\"edit(54);\">编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"del(54);\">删除</button></span>"
                }
            ],
            "tags": 2,
            "after_html": "<span class=\"button_z\"><button type=\"button\" class=\"btn btn btn-info btn-xs\" onclick=\"edit(48);\">编辑</button>&nbsp;&nbsp;&nbsp;&nbsp;<button type=\"button\" class=\"btn btn-danger btn-xs\" onclick=\"del(48);\">删除</button></span>"
        }
    ];
    var $checkableTree = $('#treeview-checkable').treeview({
        data: defaultData,
        showIcon: false,
        showCheckbox: true,
        selectedBackColor: '#ffffcc',
        selectedColor: '#000000',
        showTags: true,
        onNodeChecked: function (event, node) {
            $('#checkable-output').prepend('<p>' + node.text + ' was checked</p>');
            checkAllParent(node);
        },
        onNodeUnchecked: function (event, node) {
            $('#checkable-output').prepend('<p>' + node.text + ' was unchecked</p>');

            uncheckAllParent(node);
            uncheckAllSon(node);
        }

    });
    $('#treeview-checkable').on('nodeSelected', function (event, data) {
        console.log(data.id);
    });


    var nodeCheckedSilent = false;
    function nodeChecked(event, node) {
        if (nodeCheckedSilent) {
            return;
        }
        nodeCheckedSilent = true;
        checkAllParent(node);
        checkAllSon(node);
        nodeCheckedSilent = false;
    }

    var nodeUncheckedSilent = false;
    function nodeUnchecked(event, node) {
        if (nodeUncheckedSilent)
            return;
        nodeUncheckedSilent = true;
        uncheckAllParent(node);
        uncheckAllSon(node);
        nodeUncheckedSilent = false;
    }

    //选中全部父节点
    function checkAllParent(node) {
        $('#treeview-checkable').treeview('checkNode', node.nodeId, {silent: true});
        var parentNode = $('#treeview-checkable').treeview('getParent', node.nodeId);
        if (!("nodeId" in parentNode)) {
            return;
        } else {
            checkAllParent(parentNode);
        }
    }
    //取消全部父节点
    function uncheckAllParent(node) {
        $('#treeview-checkable').treeview('uncheckNode', node.nodeId, {silent: true});
        var siblings = $('#treeview-checkable').treeview('getSiblings', node.nodeId);
        var parentNode = $('#treeview-checkable').treeview('getParent', node.nodeId);
        if (!("nodeId" in parentNode)) {
            return;
        }
        var isAllUnchecked = true;  //是否全部没选中
        for (var i in siblings) {
            if (siblings[i].state.checked) {
                isAllUnchecked = false;
                break;
            }
        }
        if (isAllUnchecked) {
            uncheckAllParent(parentNode);
        }

    }

    //级联选中所有子节点
    function checkAllSon(node) {
        $('#treeview-checkable').treeview('checkNode', node.nodeId, {silent: true});
        if (node.nodes != null && node.nodes.length > 0) {
            for (var i in node.nodes) {
                checkAllSon(node.nodes[i]);
            }
        }
    }
    //级联取消所有子节点
    function uncheckAllSon(node) {
        $('#treeview-checkable').treeview('uncheckNode', node.nodeId, {silent: true});
        if (node.nodes != null && node.nodes.length > 0) {
            for (var i in node.nodes) {
                uncheckAllSon(node.nodes[i]);
            }
        }
    }
</script>


