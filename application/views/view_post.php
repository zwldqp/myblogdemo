<?php $name = $this->session->userdata('logindata'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="Content-Language" content="zh-CN">
    <base href="<?php echo site_url() ?>">
    <title>测试文章2 - Johnny的博客 - SYSIT个人博客</title>
    <link rel="stylesheet" href="assets/css/space2011.css" type="text/css" media="screen">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.css" media="screen">
    <script type="text/javascript" src="js/jquery-1.12.4.js"></script>
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

    <div id="OSC_Topbar">
        <?php include "admin_header.php"; ?>
        <div class="clear"></div>
    </div>
    <div id="OSC_Content">
        <div class="SpaceChannel">
            <div id="portrait"><a href="#"><img src="images/portrait.gif" alt="Johnny" title="Johnny"
                                                class="SmallPortrait" user="154693" align="absmiddle"></a></div>
            <div id="lnks">
                <strong><?php echo $name->username; ?>的博客</strong>

                <div>
                    <a href="#">TA的博客列表</a>&nbsp;|
                    <a href="javascript:sendmsg(154693)">发送留言</a>
                    </span>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="Blog">


            <div class="BlogTitle">
                <h1><?php echo $result->title; ?></h1>

                <div class="BlogStat">
					    <span class="admin">
		<em id="p_attention_count">1</em>人收藏此文章，
		<span id="attention_it">
					<a href="javascript:pay_attention(24026,true)">收藏此文章</a>
				</span>
	    </span>
                    发表于<?php echo $result->post_time; ?> ,
                    已有<strong>1</strong>次阅读
                    共<strong><a href="#comments">0</a></strong>个评论
                    <strong>1</strong>人收藏此文章
                </div>
            </div>
            <div class="BlogContent TextContent"><?php echo $result->content; ?></div>
            <div class="BlogLinks">
                <ul>
                    <?php if (isset($prev)) { ?>
                        <li>上篇 <span>(<?php echo $prev->post_time; ?>)</span>：<a
                                href="admin/view_post?id=<?php echo $prev->article_id; ?>"
                                class="prev"><?php echo $prev->title; ?></a></li>
                    <?php } ?>
                    <?php if (isset($next)) { ?>
                        <li>下篇 <span>(<?php echo $next->post_time; ?>)</span>：<a
                                href="admin/view_post?id=<?php echo $next->article_id; ?>"
                                class="prev"><?php echo $next->title; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="BlogComments">
                <h2><a name="comments" href="#postform" class="opts">发表评论»</a>共有 <?php echo count($comments); ?> , 条网友评论</h2>
                <ul id="BlogComments">
                    <?php foreach ($comments as $comment) { ?>
                        <li>
                            <p>评论人：<?php echo $name->username; ?></p>

                            <p>日期：<?php echo $comment->post_date; ?></p>

                            <p>内容：<?php echo $comment->content; ?></p>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="CommentForm">
                <a name="postform"></a>

                <form id="form_comment" action="admin/pinglun?article_id=<?php echo $result->article_id; ?>"
                      method="POST">
                    <input id="id" name="id" value="<?php echo $name->user_id; ?>" type="hidden">
                    <textarea id="ta_post_content" name="content" style="width: 450px; height: 100px;"></textarea><br>
                    <input value="发表评论" id="btn_comment" class="SUBMIT" type="submit">
                    <img id="submiting" style="display: none;" src="images/loading.gif" align="absmiddle">
                    <span id="cmt_tip">文明上网，理性发言</span>
                </form>
                <a href="#" class="more">回到顶部</a>
                <a href="#comments" class="more">回到评论列表</a>
            </div>
        </div>
        <div class="BlogMenu">
            <div class="RecentBlogs SpaceModule">
                <strong>最新博文</strong>
                <ul>
                    <?php $ant = 0;?>
                    <?php
                    foreach($results as $result){
                        $ant++;
                        ?>
                    <li><a href="admin/view_post?id=<?php echo $result->article_id; ?>"><?php echo $result->title ?></a></li>
                    <?php
                        if($ant > 1) break;
                    }
                    ?>
                    <li class="more"><a href="welcome/index">查看所有博文»</a></li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>

        <div id="inline_reply_editor" style="display:none;">
            <div class="CommentForm">
                <form id="form_inline_comment" action="" method="POST">
                    <input id="id" name="reply_id" value="" type="hidden">
                    <textarea name="content" style="width: 450px; height: 60px;"></textarea><br>
                    <input value="回复" id="btn_comment" class="SUBMIT" type="submit">
                    <input value="关闭" class="SUBMIT" id="btn_close_inline_reply" type="button"> 文明上网，理性发言
                </form>
            </div>
        </div>
        <link type="text/css" rel="stylesheet" href="assets/css/shCore.css">
        <link type="text/css" rel="stylesheet" href="assets/css/shThemeDefault.css">
</body>
</html>