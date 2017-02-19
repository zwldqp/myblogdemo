<?php $name = $this->session->userdata('logindata');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-CN">
    <base href="<?php echo site_url() ?>">
    <title>博客设置/分类管理 Johnny的博客 - SYSIT个人博客</title>
    <link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">
    <script src="assets/js/jquery-1.12.4.js"></script>
    <style type="text/css">
        body, table, input, textarea, select {
            font-family: Verdana, sans-serif, 宋体;
        }
    </style>
</head>
<body>
<!--[if IE 8]>
<style>ul.tabnav {
    padding: 3px 10px 3px 10px;
}</style>
<![endif]-->
<!--[if IE 9]>
<style>ul.tabnav {
    padding: 3px 10px 4px 10px;
}</style>
<![endif]-->
<div id="OSC_Screen"><!-- #BeginLibraryItem "/Library/OSC_Banner.lbi" -->
    <?php include "admin_header.php"?>
    <div id="OSC_Content">
        <div id="AdminScreen">
            <div id="AdminPath">
                <a href="welcome/index">返回我的首页</a>&nbsp;»
                <span id="AdminTitle" >博客设置/分类管理</span>
            </div>
            <?php include "admin_menu.php";?>
            <div id="AdminContent">
                <div class="MainForm BlogCatalogManage">
                    <form id="CatalogForm" action="admin/add" method="post">
                        <h3> 添加博客分类 </h3>

                        <div id="error_msg" class="error_msg" style="display:none;"></div>
                        <label>分类名称:</label><input id="txt_link_name" name="name" size="15" tabindex="1" type="text">
    <span class="submit">
          <input value="添加&nbsp;»" tabindex="3" class="BUTTON SUBMIT" type="submit">
        </span>
                    </form>
                    <form class="BlogCatalogs">
                        <h3>博客分类 <span>(点击分类名编辑)</span></h3>
                        <table cellpadding="1" cellspacing="1">
                            <tbody>
                            <tr>
                                <th>序号</th>
                                <th>分类名</th>
                                <th>文章</th>
                                <th>操作</th>
                            </tr>
                            <?php foreach($results as $index=>$result){ ?>
                            <tr id="catalog_92334">
                                <td class="idx"><?php echo $index+1;?></td>
                                <td class="name"><a href="editCatalog.htm" title="点击修改博客分类"><?php echo $result->type_name;?></a></td>
                                <td class="num"><?php echo $result->num;?></td>
                                <td class="opts">
                                    <a href="admin/editcatalog?id=<?php echo $result->type_id?>" title="点击修改博客分类">修改</a>
                                    <a href="admin/delete_article_type?id=<?php echo $result->type_id?>">删除</a>
                                </td>
                            </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <div class="clear"></div>
        </div>

    </div>
    <div class="clear"></div>
    <div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
</body>
</html>