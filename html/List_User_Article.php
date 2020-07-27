<html>
    <head>
        <link href="css/List_User_Article.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>
    <body>
        <div class="wrapper">
            <div class="content">
                <div class="header">
                    <a class="new">Create New Article</a>
                    <div style="display: inline-block; margin-left:">
                        <i class="fas fa-sort-amount-down"></i>
                        <select class="dropdown">
                            <option value="Latest">Latest Article</option>
                            <option value="Oldest">Oldest Article</option>
                            <option value="Popular">Popular Article</option>
                        </select>
                     </div>
                    <div class="search-box">
                        <input type="search" placeholder="Search" class="search">
                        <i class="fas fa-search"></i>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div class="article-list">
                        <?php for ($i = 0; $i < 40; $i++) {
                            echo"
                        <div class='card-latest'>
                            <div style='position:relative;'>
                                <img src='img/latest3.jpg'>
                                <div class='card-overlay'>
                                    <a><h3>edit</h3></a>
                                </div>
                            </div>
                            <div class='box-txt'>
                                <h1>3 Nutrisi Penting yang Dibutuhkan Oleh  Pelari</h1>
                                <h6><i class='far fa-clock'></i> 01 January 2019 | Lorep</h6>
                                <div id='fos'>
                                    <p>Lari merupakan salah satu cabang olahraga yang sangat bagus untuk membakar lemak. Tidak heran banyak orang yang melakukan olahraga ini demi menjaga berat badan dan kesehatannya.</p>
                                </div>
                            </div>
                        </div>
                        ";} ?>
                </div>
            </div>
        </div>
    </body>
</html>