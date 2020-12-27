<?php
    $timezone = "Asia/Tehran";
    date_default_timezone_set($timezone);
    include 'core.php'
?>
<!DOCTYPE html>
<html dir="rtl">
    <head>
        <title>Epic reader</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="assets/css/uikit-rtl.min.css" />
        <script src="assets/js/uikit.min.js"></script>
        <script src="assets/js/uikit-icons.min.js"></script>
        <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
        <style>
            @font-face {
                font-family: "Vazir";
                src: url("assets/fonts/Vazir-Light.eot");
                src: url("assets/fonts/Vazir-Light?#iefix") format("embedded-opentype"), url("assets/fonts/Vazir-Light.woff") format("woff"), url("assets/fonts/Vazir-Light.ttf") format("truetype");
                font-weight: normal;
            }
            @font-face {
                font-family: "Vazir-bold";
                src: url("assets/fonts/Vazir-Bold.eot");
                src: url("assets/fonts/Vazir-Bold.eot?#iefix") format("embedded-opentype"), url("assets/fonts/Vazir-Bold.ttf") format("truetype");
                font-weight: bold;
            }
            @font-face {
                font-family: "Vazir-medium";
                src: url("assets/fonts/Vazir-Medium.eot");
                src: url("assets/fonts/Vazir-Medium.eot?#iefix") format("embedded-opentype"), url("assets/fonts/Vazir-Medium.ttf") format("truetype");
                font-weight: 200;
            }
            * {
                font-family: 'Vazir';
                color: #2c3e50;
            }
            body {
                /* background: url('https://www.teahub.io/photos/full/111-1110876_spotify-wallpaper.jpg');
                background-repeat: no-repeat;
                background-position: center; */
                background: #34495e;
                min-height: 100vh;
            }
            table tbody tr td {
                padding: 3px !important;
            }
            #root-container {
                
            }
            .opacity-90 {
                background: rgb(255 255 255 / 90%)
            }
            .blink {
                animation: blinker 1.5s cubic-bezier(.5, 0, 1, 1) infinite alternate;  
                color: #e74c3c;
            }
            @keyframes blinker {
                from { opacity: 1; }
                to { opacity: 0; }
            }
            .favicon {
                max-width: 15px;
                margin-left: 5px;   
            }
        </style>
    </head>
    <body>
        <div id="root-container" class="uk-container uk-container-medium uk-margin-auto uk-padding-large">
            <div class="uk-card uk-card-default uk-card-large uk-card-body uk-width-1-1@m uk-border-rounded opacity-90">
                <ul uk-tab>
                    <li><a class="uk-text-bold" href="#">اقتصادی</a></li>
                    <li><a class="uk-text-bold" href="#">سیاسی</a></li>
                    <li><a class="uk-text-bold" href="#">حوادث</a></li>
                </ul>

                <ul class="uk-switcher uk-margin">
                    <li>
                        <div class="uk-overflow-auto">
                            <table class="uk-table uk-table-divider uk-table-justify">
                                <!-- <caption>آخرین اخبار اقتصادی</caption> -->
                                <!-- 
                                <thead>
                                    <tr>
                                        <th>Table Heading</th>
                                        <th>Table Heading</th>
                                        <th>Table Heading</th>
                                        <th>Table Heading</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td>Table Footer</td>
                                        <td>Table Footer</td>
                                        <td>Table Footer</td>
                                        <td>Table Footer</td>
                                    </tr>
                                </tfoot>
                                -->
                                <tbody>
                                <?php
                                    $counter = 0;
                                    foreach ($op as $timestamp => $item):
                                    if (++$counter == 26) break;
                                ?>
                                <?php
                                    
                                    $timestamp_to_date = date('Y/d/m H:i:s', $item['timestamp']);
                                    $date_part = explode(' ', $timestamp_to_date);
                                    $date_part = explode('/', $date_part[0]);
    
                                    $jYear  = $date_part[0];
                                    $jMonth = $date_part[1];
                                    $jDay   = $date_part[2];

                                    $date = gregorian_to_jalali($jYear, $jMonth, $jDay, '-');
                                    $en = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
                                    $fa = ['۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'];
                                    $date = str_replace($en, $fa, $date);
                                    $favicon = '';
                                    if ($item['src'] == 'گسترش‌نیوز') {
                                        $favicon = 'https://www.gostaresh.news/favicon-57.png';
                                    }
                                    if ($item['src'] == 'اقتصاد آنلاین') {
                                        $favicon = 'https://www.eghtesadonline.com/favicon.ico';
                                    }
                                    if ($item['src'] == 'اقتصاد نیوز') {
                                        $favicon = 'https://www.eghtesadonline.com/favicon.ico';
                                    }
                                    if ($item['src'] == 'تسنیم') {
                                        $favicon = 'https://www.tasnimnews.com/static/img/icons/favicon.ico';
                                    }
                                    if ($item['src'] == 'مشرق') {
                                        $favicon = 'https://www.mashreghnews.ir/resources/theme/mashreghnews/img/favicon.ico';
                                    }
                                    if ($item['src'] == 'پندار آنلاین') {
                                        $favicon = 'https://www.pendaronline.news/favicon.ico';
                                    }
                                ?>
                                    <tr>
                                        <td class="uk-table-shrink"><ion-icon name="ellipse-outline" class="blink"></ion-icon></td>
                                        <td class="uk-table-expand"><a class="uk-link-reset" href="<?php echo $item['url']; ?>" target="_blank"><?php echo $item['title']; ?></a></td>
                                        <td class="uk-table-expand"><img class="favicon" src="<?php echo $favicon; ?>" alt=""><?php echo $item['src']; ?></td>
                                        <td class="uk-table-expand"><?php echo $date; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </li>
                    <li>دیتاست آماده نشده است.</li>
                    <li>دیتاست آماده نشده است.</li>
                </ul>
            </div>
        </div>
    </body>
</html>