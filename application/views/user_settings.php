<?php $name = $this->session->userdata('logindata'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-CN">
    <base href="<?php echo site_url() ?>">
    <title><?php echo $name->username; ?>的博客 - SYSIT个人博客</title>
    <link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">
    <script type="text/javascript" src="assets/js/jquery-1.12.4.js"></script>
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
    <?php include"admin_header.php"; ?>
    <div id="OSC_Content">
        <div id="AdminScreen">
            <div id="AdminPath">
                <a href="welcome/index">返回我的首页</a>&nbsp;»
                <span id="AdminTitle">管理首页</span>
            </div>
            <div id="AdminMenu">
                <ul>
                    <li class="caption">个人信息管理
                        <ol>
                            <li><a href="inbox.htm">站内留言(0/1)</a></li>
                            <li><a href="profile.htm">编辑个人资料</a></li>
                            <li><a href="chpwd.htm">修改登录密码</a></li>
                            <li class="current"><a href="admin/user_settings">网页个性设置</a></li>
                        </ol>
                    </li>
                </ul>
                <ul>
                    <li class="caption">博客管理
                        <ol>
                            <li><a href="admin/newBlog">发表博客</a></li>
                            <li><a href="blogCatalogs.htm">博客设置/分类管理</a></li>
                            <li><a href="admin/blogs">文章管理</a></li>
                            <li><a href="blogComments.htm">博客评论管理</a></li>
                        </ol>
                    </li>
                </ul>
            </div>
            <div id="AdminContent">
                <div class="MainForm">
                    <form id="style_form" action="admin/save_mood" method="POST">
                        <h2 class="title">网页个性化设置</h2>
                        <table>
                            <tbody>
                            <tr>
                                <th>我的心情</th>
                                <td><input name="mood" size="40" maxlength="40" class="TEXT" value="<?php echo $name->mood;?>"
                                           type="text"></td>
                            </tr>
                            <tr>
                                <th></th>
                                <td></td>
                            </tr>
                            <tr class="submit">
                                <th></th>
                                <td>
                                    <input value="保存修改" class="BUTTON SUBMIT" type="submit">
                                    <span id="error_msg" style="display:none"></span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <div class="clear"></div>
        </div>

</body>
</html>