<?php

echo "<pre>";

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

$op = XMLrender([
    'gostaresh.news' => 'https://www.gostaresh.news/fa/feeds/?p=Y2F0ZWdvcmllcz04Mw%2C%2C',
    'rokna.net' => 'https://www.rokna.net/fa/feeds/?p=Y2F0ZWdvcmllcz02NQ%2C%2C'
]);

print_r($op);