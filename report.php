<?php
  $connect = new mysqli('localhost', 'root', 'root', 'olimpics');
  $result = $connect->query("SELECT * FROM `review`");
  $reviews = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<section class="search_tours_table">
        <div class="wrapper">
            <table class="tours_table">
                <tr class="tours_table_row">
                    <th class="tours_table_cell tours_name">ФИО</th>
                    <th class="tours_table_cell tours_from">Дата обращения</th>
                    <th class="tours_table_cell tours_to">e-mail</th>
                    <th class="tours_table_cell tours_date">Телефон</th>
                    <th class="tours_table_cell tours_nights">Комментарий</th>
                </tr>
                <?php foreach($reviews as $review):?>
                  <tr class="tours_table_row">
                      <td class="tours_table_cell tours_name"><?= $review['user_name']?></td>
                      <td class="tours_table_cell tours_from"><?= $review['date']?></td>
                      <td class="tours_table_cell tours_to"><?= $review['email']?></td>
                      <td class="tours_table_cell tours_date"><?= $review['phone']?></td>
                      <td class="tours_table_cell tours_nights"><?= $review['message']?></td>
                  </tr>
                <?php endforeach;?>
            </table>
        </div>
    </section>

</body>
</html>