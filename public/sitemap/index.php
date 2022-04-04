<?php 
    header('Content-type: text/xml'); 
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo "\n";
    echo '<?xml-stylesheet type="text/xsl" href="sitemap.xsl"?>'; 
    echo "\n";
    require_once("../../config.php");
    $_connection = mysqli_connect("127.0.0.1", $_db_user, $_db_pswd, $_db_name);
    $_query = "SELECT max(`createTime`) from `data`";
    $result =  mysqli_query($_connection, $_query);
    $lastmod = mysqli_fetch_row($result)[0];
?>
<sitemapindex xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/siteindex.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <sitemap>
        <loc>https://www.socialcredit.icu/sitemap/map.php?page=1</loc>
        <lastmod><?echo date('c', strtotime($lastmod)); ?></lastmod>
    </sitemap>
</sitemapindex>