<?php 
    header('Content-type: text/xml'); 
    echo '<?xml version="1.0" encoding="UTF-8"?>';
    echo "\n";
    echo '<?xml-stylesheet type="text/xsl" href="sitemap.xsl"?>'; 
    echo "\n";
?>
<urlset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/siteindex.xsd" xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php
	require_once("../../config.php");
	$_connection = mysqli_connect("127.0.0.1", $_db_user, $_db_pswd, $_db_name);
    $_query = "SELECT `id`, `createTime` from `data`";
    $result =  mysqli_query($_connection, $_query);
    while (1)
    {
        $id = mysqli_fetch_row($result);
        if (!$id)
        {
            break;
        }
        echo "    <url>\n";
        echo "        <loc>https://www.socialcredit.icu/show/?p=" . $id[0] . "</loc>\n";
        echo "        <lastmod>" . date('c', strtotime($id[1])) . "</lastmod>\n";
        echo "    </url>\n";
    }
?>
</urlset>