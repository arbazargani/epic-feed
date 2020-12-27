<?php
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
                            ?>
                                <tr>
                                    <td class="uk-table-shrink"><ion-icon name="ellipse-outline" class="blink"></ion-icon></td>
                                    <td class="uk-table-expand"><?php echo $item['title']; ?></td>
                                    <td class="uk-table-expand"><?php echo $item['src']; ?></td>
                                    <td class="uk-table-expand"><?php echo $date; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </li>
                    <li>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                    <li>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur, sed do eiusmod.</li>
                </ul>
            </div>
        </div>
    </body>
</html>