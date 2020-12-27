<?php
require 'jdf.php';

function XMLrender($streams) {
    $data = [];
    $timestamps = [];
    foreach($streams as $owner => $stream) {
        $stream = file_get_contents($stream);
        $parser = simplexml_load_string($stream);
        
        foreach ($parser->channel->item as $item) {
            $date = (string )$item->pubDate;
            // echo "$date\r\n";
            $time = strtotime($item->pubDate);
            // echo "$time\r\n";
            $link  = (string) $item->link;
            // echo "$link\r\n";
            $title = (string) $item->title;
            // echo "$title\r\n";
            $text  = (string) $item->description;
            // echo "<hr>";
        
            $data[] = [
                'src' => $owner,
                'timestamp' => $time,
                'url' => $link,
                'title' => $title
            ];
        
            $timestamps[$time] = [
                'src' => $owner,
                'timestamp' => $time,
                'url' => $link,
                'title' => $title
            ];
        }
    }
    krsort($timestamps);
    return $timestamps;
};

function FileXMLrender ($streams) {
    header('Content-type: text/html; charset=utf-8');
    mb_internal_encoding('UTF-8');

    $data = [];
    $timestamps = [];
    foreach($streams as $owner => $stream) {
        $stream = file_get_contents($stream);
        $handle= fopen("stream.txt", "w");
        fwrite($handle, $stream);

        $parser = simplexml_load_file($stream);
        
        foreach ($parser->channel->item as $item) {
            $date = (string )$item->pubDate;
            // echo "$date\r\n";
            $time = strtotime($item->pubDate);
            // echo "$time\r\n";
            $link  = (string) $item->link;
            // echo "$link\r\n";
            $title = (string) $item->title;
            // echo "$title\r\n";
            $text  = (string) $item->description;
            // echo "<hr>";
        
            $data[] = [
                'src' => $owner,
                'timestamp' => $time,
                'url' => $link,
                'title' => $title
            ];
        
            $timestamps[$time] = [
                'src' => $owner,
                'timestamp' => $time,
                'url' => $link,
                'title' => $title
            ];
        }
    }
}

$op = XMLrender([
    'گسترش‌نیوز' => 'https://www.gostaresh.news/fa/feeds/?p=Y2F0ZWdvcmllcz04Mw%2C%2C',
    'اقتصاد آنلاین' => 'https://www.eghtesadonline.com/fa/feeds/?p=Y2F0ZWdvcmllcz0xMA%2C%2C',
    'اقتصاد نیوز' => 'https://www.eghtesadnews.com/fa/feeds/?p=Y2F0ZWdvcmllcz02Nw%2C%2C',
    'تسنیم' => 'https://www.tasnimnews.com/fa/rss/feed/0/7/7/%D8%A7%D9%82%D8%AA%D8%B5%D8%A7%D8%AF%DB%8C',
    'مشرق' => 'https://www.mashreghnews.ir/rss/tp/16',
    'پندار آنلاین' => 'https://www.pendaronline.news/fa/feeds/?p=Y2F0ZWdvcmllcz00'
]);

// $op = FileXMLrender([
//     // 'gostaresh.news' => 'https://www.gostaresh.news/fa/feeds/?p=Y2F0ZWdvcmllcz04Mw%2C%2C',
//     // 'rokna.net' => 'https://www.rokna.net/fa/feeds/?p=Y2F0ZWdvcmllcz02NQ%2C%2C',
//     // 'yjc.ir' => 'https://www.yjc.ir/fa/rss/5/18'
// ]);
// echo '<pre>';
// print_r($op);