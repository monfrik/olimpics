<?php
session_start();
$tours = json_decode($_GET['tours'],true);
$login = $_SESSION["login"];
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
    
    <section class="main">
        <div class="nav">
            <div class="logo">
                <p class="logoName">Тур</p>
                <p class="logoTitle">lines</p>
            </div>
            <nav class="navPanel">
                <a href="#" class="link navLink">Топ 20</a>
                <a href="#" class="link navLink">Туры</a>
                <a href="#" class="link navLink">Бронирование</a>
                <a href="#" class="link navLink">Контакты</a>
            </nav>
            <div class="personalАccount">
                <a class="link personalLink">Личный кабинет</a>
                <?php if(!empty($login)):?>
                <a href="logout.php" class="username">User: <?= $login;?></a>
                <?php endif;?>
            </div>
        </div>

        <div class="wrapper">
            <div class="description">
                <p class="lineOne">Отпуск мечты <span class="lineOneSpan">не зависнет в воздухе!</span></p>
                <p class="lineTwo">Туры по<p>
                <p class="lineThree">Всему <span class="lineThreeSpan">Миру</span></p>
                <!-- h1  -->
            </div>
        </div>

        <section class="formConnection modal">
            <h2 class="modalTitle">Вход или Регистрация</h2>

            <form action="auth.php" class="modalForm" method="post">
                <div class="formConsist">
                    <input type="checkbox" id="authType" name="authType" class="checkbox authType" required>
                    <label for="authType" class="formAuthLabel">У меня уже есть учетная запись</label>
                </div>
                <input type="email" class="modalInput"  name="email">
                <input type="password" class="modalInput"  name="password">

                <div class="formConsist">
                    <input type="checkbox" name="confirm" id="confirm" class="checkbox permission" required>
                    <label for="confirm" class="formAuthLabel">Согласие на обработку персональных данных</label>
                </div>
                    
                <input type="submit" class="modalButton" value="Вход/Регистрация">
            </form>
        </section>
    </section>

    <!--  -->

    <section class="countries">
        <div class="wrapper">
            <h2 class="countries_title">ТОП 20</h2>
            <div class="countries_list">
                <p class="countries_items">
                    <span class="france">Франция, </span>
                    <span class="spain">Испания, </span>
                    <span class="usa">США, </span>
                    <span class="china">Китай, </span>
                    <span class="italy">Италия, </span>
                    <br>
                    <span class="turkey">Турция, </span>
                    <span class="mexico">Мексика, </span>
                    <span class="germany">Германия, </span>
                    <span class="thailand">Тайланд, </span>
                    <span class="united_kingdom">Великобритания, </span>
                    <span class="japan">Япония, </span>
                    <span class="austria">Австрия, </span>
                    <span class="greece">Греция, </span>
                    <span class="hong_kong">Гонконг, </span>
                    <span class="malaysia">Малазия, </span>
                    <span class="russia">Россия, </span>
                    <span class="portugal">Португалия, </span>
                    <br>
                    <span class="canada">Канада, </span>
                    <span class="poland">Польша, </span>
                    <span class="holland">Голландия</span>
                </p>
            </div>
        </div>
    </section>

    <?php if(!empty($login) && empty($tours)):?>
    <section class="searchTours">
        <div class="wrapper">
            <h2 class="searchTours_title">Поиск тура</h2>
            <form action="searchTour.php" method="post" class="searchToursWrapper">
                <div class="searchToursRoute">
                    <div class="searchToursRouteFrom">
                        <span class="searchToursSpan">Откуда</span>
                        <select name="from" class="searchToursSelect">
                            <option>Ростов-на-Дону</option>
                            <option>Краснодар</option>
                            <option>Самара</option>
                            <option>Москва</option>
                            <option>Санкт-Петербург</option>
                            <option>Казань</option>
                        </select>
                    </div>

                    <div  class="searchToursRouteFinish">
                        <span class="searchToursSpan">Куда</span>
                        <select name="to" class="searchToursSelect">
                            <option>ОАЭ Шарджа</option>
                            <option>Португалия Порту</option>
                            <option>Германия Мюнхен</option>
                            <option>Марокко Маракеш</option>
                            <option>Хорватия Загреб</option>
                            <option>Словения Струньян</option>
                            <option>Словакия Смрдаки</option>
                            <option>Франция Париж</option>
                        </select>
                    </div>

                </div>
                
                <div class="searchToursCountNights">
                    <span class="searchToursSpan">Ночей</span>
                    <select name="quantity" class="searchToursSelect searchToursSelectCountNights">
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                    </select>
                </div>

                <input type="submit" class="searchToursButton" value="Подобрать тур">
            </form>
        </div>
    </section>
    <?php endif;?>

    <!--  -->
    <?php if(!empty($tours)):?>
    <section class="searchToursTable">
        <div class="wrapper">
            <h2 class="searchToursTableTitle">Подходящие туры</h2>
            <table class="toursTable">
                <tr class="toursTableRow">
                    <th class="toursTableCell toursName">Название тура</th>
                    <th class="toursTableCell toursFrom">Откуда</th>
                    <th class="toursTableCell toursTo">Куда</th>
                    <th class="toursTableCell toursDate">Дата</th>
                    <th class="toursTableCell toursNights">Кол-во ночей</th>
                    <th class="toursTableCell toursPrice">Цена</th>
                </tr>
                <?php foreach($tours as $tour):?>
                <tr class="toursTableRow">
                    <td class="toursTableCell toursName"><?= $tour['name']?></td>
                    <td class="toursTableCell toursFrom"><?= $tour['from']?></td>
                    <td class="toursTableCell toursTo"><?= $tour['to']?></td>
                    <td class="toursTableCell toursDate"><?= $tour['departure_date']?></td>
                    <td class="toursTableCell toursNights"><?= $tour['quantity']?></td>
                    <td class="toursTableCell toursPrice"><?= $tour['price']*$tour['quantity']?></td>
                </tr>
                <?php endforeach;?>
            </table>
            <button class="searchToursButton getReview">Получить консультацию</button>
        </div>
    </section>
    <?php endif; ?>

    <section class="formReview modal">
            <h2 class="modalTitle">Обратная связь</h2>
            <form action="sendReview.php" class="modalForm" method="post">
                <div class="formRow">
                	<input type="email" class="modalInput" name="email" placeholder="e-mail *" required>
                    <input type="text" class="modalInput" name="telephone" placeholder="Телефон*" required>
                </div>

                <input type="text" class="modalInput" name="name" placeholder="ФИО*" required>

                <textarea class="modalInput" name="message" rows="5" cols="33" placeholder="Коментарий*" required></textarea>

                <input type="submit" class="modalButton formReviewButton" value="Отправить">
            </form>
        </section>

    <!--  -->

    <section class="tours">
        <div class="wrapper">
            <h2 class="toursTitle">Туры</h2>
            <div class="toursList">
                <div class="toursItem">
                    <div class="toursItemHeader">
                        <img class="toursItemImg" src="assets/images/FortunaSharjah.jpg">
                        <div class="toursItemHeaderWrapper">
                            <h3 class="toursItemCountry">ОАЭ</h3>
                            <h3 class="toursItemCity">Шарджа</h3>
                            <div class="toursItemRate">
                                <span class="toursItemPrice">20 700 ₽</span>
                                <span class="toursItemMark">за человека</span>
                            </div>
                            <div class="toursItemGrade">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                            </div>
                        </div>
                    </div>
    
                    <div class="toursItemDescription">
                        <h3 class="toursItemTitle">Fortuna Sharjah</h3>
                        <div class="toursItemPeriod">
                            <p class="toursItemDateStart">с 12.02,</p>
                            <p class="toursItemDateCount">6 ночей</p>
                        </div>
                    </div>
                </div>
                
                <div class="toursItem">
                    <div class="toursItemHeader">
                        <img class="toursItemImg" src="assets/images/StarinnPorto.png" alt="">
                        <div class="toursItemHeaderWrapper">
                            <h3 class="toursItemCountry">Португалия</h3>
                            <h3 class="toursItemCity">Порту</h3>
                            <div class="toursItemRate">
                                <span class="toursItemPrice">30 650 ₽</span>
                                <span class="toursItemMark">за человека</span>
                            </div>
                            <div class="toursItemGrade">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                            </div>
                        </div>
                    </div>
    
                    <div class="toursItemDescription">
                        <h3 class="toursItemTitle">Star inn Porto</h3>
                        <div class="toursItemPeriod">
                            <p class="toursItemDateStart">с 15.02,</p>
                            <p class="toursItemDateCount">7 ночей</p>
                        </div>
                    </div>
                </div>

                <div class="toursItem">
                    <div class="toursItemHeader">
                        <img class="toursItemImg" src="assets/images/MuenchenCity.png" alt="">
                        <div class="toursItemHeaderWrapper">
                            <h3 class="toursItemCountry">Германия</h3>
                            <h3 class="toursItemCity">Мюнхен</h3>
                            <div class="toursItemRate">
                                <span class="toursItemPrice">15 700 ₽</span>
                                <span class="toursItemMark">за человека</span>
                            </div>
                            <div class="toursItemGrade">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                            </div>
                        </div>
                    </div>
    
                    <div class="toursItemDescription">
                        <h3 class="toursItemTitle">Muenchen City</h3>
                        <div class="toursItemPeriod">
                            <p class="toursItemDateStart">с 13.02,</p>
                            <p class="toursItemDateCount">4 ночи</p>
                        </div>
                    </div>
                </div>

                <div class="toursItem">
                    <div class="toursItemHeader">
                        <img class="toursItemImg" src="assets/images/AtlasMedina.png" alt="">
                        <div class="toursItemHeaderWrapper">
                            <h3 class="toursItemCountry">Марокко</h3>
                            <h3 class="toursItemCity">Маракеш</h3>
                            <div class="toursItemRate">
                                <span class="toursItemPrice">48 793 ₽</span>
                                <span class="toursItemMark">за человека</span>
                            </div>
                            <div class="toursItemGrade">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                            </div>
                        </div>
                    </div>
                    
                    <div class="toursItemDescription">
                        <h3 class="toursItemTitle">Atlas Medina</h3>
                        <div class="toursItemPeriod">
                            <p class="toursItemDateStart">с 12.02,</p>
                            <p class="toursItemDateCount">6 ночей</p>
                        </div>
                    </div>
                </div>

                <div class="toursItem">
                    <div class="toursItemHeader">
                        <img class="toursItemImg" src="assets/images/ArtHotelLike.png" alt="">
                        <div class="toursItemHeaderWrapper">
                            <h3 class="toursItemCountry">Хорватия</h3>
                            <h3 class="toursItemCity">Загреб</h3>
                            <div class="toursItemRate">
                                <span class="toursItemPrice">33 700 ₽</span>
                                <span class="toursItemMark">за человека</span>
                            </div>
                            <div class="toursItemGrade">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                            </div>
                        </div>
                    </div>
    
                    <div class="toursItemDescription">
                        <h3 class="toursItemTitle">Art Hotel Like</h3>
                        <div class="toursItemPeriod">
                            <p class="toursItemDateStart">с 15.02,</p>
                            <p class="toursItemDateCount">7 ночей</p>
                        </div>
                    </div>
                </div>

                <div class="toursItem">
                    <div class="toursItemHeader">
                        <img class="toursItemImg" src="assets/images/Laguna.png" alt="">
                        <div class="toursItemHeaderWrapper">
                            <h3 class="toursItemCountry">Словения</h3>
                            <h3 class="toursItemCity">Струньян</h3>
                            <div class="toursItemRate">
                                <span class="toursItemPrice">25 250 ₽</span>
                                <span class="toursItemMark">за человека</span>
                            </div>
                            <div class="toursItemGrade">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                            </div>
                        </div>
                    </div>
    
                    <div class="toursItemDescription">
                        <h3 class="toursItemTitle">Laguna</h3>
                        <div class="toursItemPeriod">
                            <p class="toursItemDateStart">с 13.02,</p>
                            <p class="toursItemDateCount">4 ночи</p>
                        </div>
                    </div>
                </div>

                <div class="toursItem">
                    <div class="toursItemHeader">
                        <img class="toursItemImg" src="assets/images/Morava.png" alt="">
                        <div class="toursItemHeaderWrapper">
                            <h3 class="toursItemCountry">Словакия</h3>
                            <h3 class="toursItemCity">Смрдаки</h3>
                            <div class="toursItemRate">
                                <span class="toursItemPrice">64 000 ₽</span>
                                <span class="toursItemMark">за человека</span>
                            </div>
                            <div class="toursItemGrade">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                            </div>
                        </div>
                    </div>
                    
                    <div class="toursItemDescription">
                        <h3 class="toursItemTitle">Morava</h3>
                        <div class="toursItemPeriod">
                            <p class="toursItemDateStart">с 12.02,</p>
                            <p class="toursItemDateCount">5 ночей</p>
                        </div>
                    </div>
                </div>

                <div class="toursItem">
                    <div class="toursItemHeader">
                        <img class="toursItemImg" src="assets/images/FourSeasons.png" alt="">
                        <div class="toursItemHeaderWrapper">
                            <h3 class="toursItemCountry">Франция</h3>
                            <h3 class="toursItemCity">Париж</h3>
                            <div class="toursItemRate">
                                <span class="toursItemPrice">55 350 ₽</span>
                                <span class="toursItemMark">за человека</span>
                            </div>
                            <div class="toursItemGrade">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                                <img class="toursItemGradeStar" src="assets/images/Vector (1).svg" alt="картинка">
                            </div>
                        </div>
                    </div>
    
                    <div class="toursItemDescription">
                        <h3 class="toursItemTitle">Four Seasons</h3>
                        <div class="toursItemPeriod">
                            <p class="toursItemDateStart">с 12.02,</p>
                            <p class="toursItemDateCount">5 ночей</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>


    <?php if (empty($login)):?>
    <section class="reservation">
        <div class="wrapper">
            <h2 class="reservationTitle">Бронирование</h2>
            <p class="reservationDescription">Пройдите регистрацию или выполните вход в свою учетную запись</p>
            <button class="reservationButton">Регистрация/Вход</button>
        </div>
    </section>
    <?php endif;?>


    <footer>
        <div class="wrapper">
            <div class="footer">
                <div class="footerContacts">
                    <h2 class="footerTitle footerContactsTitle">Контакты</h2>
                    <div  class="footerContactsLinks">
                        <a  class="footerLink footerContactsLink" href="#">e-mail: tourlines@gmail.com</a>
                        <a  class="footerLink footerContactsLink" href="#">тел.: +7 (895) 366 - 66 - 88</a>
                    </div>

                    <div class="footer_contacts_messengers">
                        <img class="messengers_icon" src="assets/images/facebook.svg" alt="картинка">
                        <img class="messengers_icon" src="assets/images/twitter.svg" alt="картинка">
                        <img class="messengers_icon" src="assets/images/whats.svg" alt="картинка">
                    </div>
                </div>

                <div class="footer_menu">
                    <h2 class="footer_title footer_menu_title">Меню</h2>
                    <div class="footerMenuLinks">
                        <a class="footerLink footerMenuLink" href="#">ТОП 20</a>
                        <a class="footerLink footerMenuLink" href="#">Туры</a>
                        <a class="footerLink footerMenuLink" href="#">Бронирование</a>
                        <a class="footerLink footerMenuLink" href="#">Контакты</a>
                    </div>
                </div>

                <div class="footerDescription">
                    <p class="footerDescriptionText">Сайт сети туристических агентств «Розовый Слон» предлагает туры на любой вкус от ведущих туроператоров!К вашим услугам всегда актуальные предложения и удобный поиск горящих туров. Подбор горящих путевок максимально прост и удобен.Туры с вылетами из Москвы, Ростова-на-Дону, Краснодара, Волгограда, Саратова, Минеральных Вод.</p>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>