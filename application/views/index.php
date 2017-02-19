<?php $name = $this->session->userdata('logindata');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xml:lang="zh-CN" xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-CN">
    <base href="<?php echo site_url(); ?>">
    <title><?php echo $name->username; ?>的博客 - SYSIT个人博客</title>
    <link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">
    <script type="text/javascript" src="assets/js/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/jquery_002.js"></script>
    <script type="text/javascript" src="assets/js/oschina.js"></script>
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
    <?php include"admin_header.php";?>
    <div id="OSC_Content">
        <div class="SpaceChannel">
            <div id="portrait"><a href=""><img src="images/portrait.gif"
                                                             alt="<?php echo $name->username; ?>"
                                                             title="<?php echo $name->username; ?>"
                                                             class="SmallPortrait" user="154693" align="absmiddle"></a>
            </div>
            <div id="lnks">
                <strong><?php echo $name->username; ?>的博客</strong>

                <div>
                    <a href="#">TA的博客列表</a>&nbsp;|
                    <a href="sendMsg.htm">发送留言</a>
                    </span>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="BlogList">
            <ul>

                <?php foreach($articles as $article){ ?>  <li>
                    <h2 class='BlogAccess_true BlogTop_0'><a href="admin/view_post?id=<?php echo $article->article_id; ?>" id="<?php echo $article->article_id; ?>"><?php echo $article->title; ?></a></h2>
                    <div class='outline'>
                        <span class='time'><?php echo $article->post_time; ?></span>
                        <span class='catalog'>分类: <a href="?catalog=92334"><?php echo $article->type_name; ?></a></span>

                        <span class='stat'>统计: 0评/0阅</span>

                    </div>

                    <div class='TextContent' id='blog_content_24027'>
                        <?php echo $article->content; ?>
                        <div class='fullcontent'><a href="viewPost_comment.htm">阅读全文...</a></div>

                    </div>
                </li>  <?php } ?>

            </ul>
            <div class="clear"></div>
        </div>
        <div class="BlogMenu">
            <div class="admin SpaceModule">
                <strong>博客管理
                    <ul class="LinkLine">
                        <li><a href="admin/adminIndex">Blog管理页面</a>
                            <!--                    <li><a href="newBlog.htm">发表博客</a><>-->
                            <!--                    <li><a href="blogCatalogs.htm">博客分类管理</a><>-->
                            <!--                    <li><a href="blogs.htm">文章管理</a><>-->
                            <!--                    <li><a href="blogComments.htm">网友评论管理</a><>-->
                    </ul>
            </div>

<!--            <div class="catalogs SpaceModule">-->
<!--                <strong>博客分类</strong>-->
<!--                <ul class="LinkLine">-->
<!--                    <li><a href="#">工作日志(2)</a></li>-->
<!--                    <li><a href="#">日常记录(0)</a></li>-->
<!--                    <li><a href="#">转贴的文章(0)</a></li>-->
<!--                </ul>-->
<!--            </div>-->
            <div class="catalogs SpaceModule">
                <strong>博客分类<>
                    <ul class="LinkLine">
                        <?php
                        foreach ($types as $type) {
                        ?>
                        <li><a href="#"><?php echo $type->type_name; ?>(<?php echo $type->num ?>)</a>
                            <?php
                            }
                            ?>
                    </ul>
            </div>

            <div class="comments SpaceModule">
                <strong>最新网友评论</strong>

                <p class="NoData">目前还没有任何评论</p>
            </div>
        </div>
        <div class="clear"></div>
        <script type="text/javascript" src="assets/js/brush.js"></script>
        <link type="text/css" rel="stylesheet" href="assets/css/shCore.css">
        <link type="text/css" rel="stylesheet" href="assets/css/shThemeDefault.css">
    </div>
    <div class="clear"></div>
    <div id="OSC_Footer">© 赛斯特(WWW.SYSIT.ORG)</div>
</div>
</body>
</html>