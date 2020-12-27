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
            body {
                /* background: url('https://www.teahub.io/photos/full/111-1110876_spotify-wallpaper.jpg');
                background-repeat: no-repeat;
                background-position: center; */
                background: #34495e;
                min-height: 100vh;
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
        <div id="root-container" class="uk-container uk-container-small uk-margin-auto uk-padding-large">
            <div class="uk-card uk-card-default uk-card-large uk-card-body uk-width-1-1@m uk-border-rounded opacity-90">
                <ul uk-tab>
                    <li><a href="#">اقتصادی</a></li>
                    <li><a href="#">سیاسی</a></li>
                    <li><a href="#">حوادث</a></li>
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
                            <?php foreach ($op as $timestamp => $item): ?>
                                <tr>
                                    <td class="uk-table-shrink"><ion-icon name="ellipse-outline" class="blink"></ion-icon></td>
                                    <td class="uk-table-expand"><?php echo $item['title']; ?></td>
                                    <td class="uk-table-small"><?php echo $item['src']; ?></td>
                                    <td class="uk-table-small"><?php echo date('Y/d/m H:i:s', $item['timestamp']); ?></td>
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