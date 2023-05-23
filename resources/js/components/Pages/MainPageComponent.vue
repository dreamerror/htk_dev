<template>
    <div class="main-wrapper">
        <div class="main-bg">
            <div class="main-contacts">
                <div class="contact-elem">
                    <span>Перевозки "Беркут"</span>
                    <a href="tel:+74232111111">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        +7 423 211-11-11
                    </a>
                </div>

                <div class="contact-elem">
                    <span>Склад временного хранения</span>
                    <a href="tel:+74232111111">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        +7 423 211-11-11
                    </a>
                    <a href="tel:+74232111111">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        +7 423 211-11-11
                    </a>
                </div>

                <div class="contacts-button">
                    Заказать обратный звонок
                </div>
            </div>
            <header-only-main
            :url="url">

            </header-only-main>
            <div class="main-description">
                <div class="main-description-logo">
                    <div class="main-image-wrapper">
                        <img src="/storage/htk-logo-color-main.svg" class alt="">
                    </div>
                    <div class="header-description-wrapper">
                        <h4>
                            Полноценный комплекс услуг <br/> в области внешнеэкономической деятельности
                        </h4>
                    </div>

                    <div class="button-wrapper">
                        ПОДРОБНЕЕ
                    </div>
                </div>

                <div class="main-description-text">
                    <p>
                        Наши специалисты обеспечат эффективную доставку автомобильным транспортом
                        Ваших товаров до двери, взяв на себя все формальности с перевозкой, хранением
                        на складе временного хранения (СВХ) и таможенным оформлением, оформим транзитные грузы
                    </p>
                    <p>
                        Обращаясь к нам, Вы получаете гарантию нашими финансовыми обязательствами перед таможенными
                        органами по таможенным платежам и возмещению ущерба при утрате по
                        страхованию гражданской ответственности
                    </p>
                    <p>
                        Не являясь крупной корпорацией, отягощенной бюрократическим аппаратом, мы
                        индивидуально подходим к каждому клиенту и оказываем услуги в более
                        минимальные сроки
                    </p>
                    <p>
                        ООО "Хасанская транспортная компания" оказывает спектр услуг в области внешнеэкономической
                        деятельности, стремясь создать полноценный комплекс услуг "под ключ"
                    </p>
                </div>
            </div>
        </div>

        <main-card-list
        :cards="cards">

        </main-card-list>
    </div>
</template>

<script>
export default {
    name: "MainPageComponent",
    props: {
      cards: Array,
      url: String,
    },
}
</script>

<style scoped lang="scss">

    .main-bg {
        width: 100%;
        padding: 2vh 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        position: relative;
    }

    .main-bg:after {
        content : "";
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        background-image: url('/storage/bg/main-bg.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        width: 100%;
        height: 100%;
        opacity : 0.3;
        z-index: -100;
    }

    .main-contacts {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        width: 60%;
        padding-top: 4vh;
        padding-left: 1vw;

        .contact-elem {
            display: flex;
            flex-direction: column;

            span {
                text-transform: uppercase;
                margin-bottom: 0.25rem;
                font-size: 1rem;
            }

            a {
                text-decoration: none;
                color: #111111;
                font-size: 1rem;
            }
        }

        .contacts-button {
            text-transform: uppercase;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 35%;
            padding: 1px 15px;
            border: 2px solid #ffffff;
            color: #ffffff;
            font-weight: bold;
            cursor: pointer;
            border-radius: 50px;
        }
    }

    .main-wrapper {
        display: flex;
        justify-content: space-around;
        gap: 5vh;
        flex-wrap: wrap;
        width: 100%;
    }

    .main-description {
        width: 100%;
        display: flex;
        flex-wrap: wrap;
        flex-direction: row;
        justify-content: space-between;
        gap: 3vw;
        padding: 10vh 15vw 35vh 17vw;
        color: #111111;

        .main-description-logo {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            width: 50%;
            gap: 4vh;

            .description-border {
                width: 50%;
                margin-left: 3.5vw;
                border-bottom: 2px solid black;
            }

            .button-wrapper {
                width: 25%;
                display: flex;
                justify-content: center;
                font-size: 18px;
                align-items: center;
                padding: 1px 1px;
                border: 1px solid #316851;
                color: #ffffff;
                background: #316851;
                cursor: pointer;
                border-radius: 5px;
                margin-left: 3.5vw;
            }

            .main-image-wrapper img {
                width: 115%;
                aspect-ratio: 2;

            }

            .main-image-wrapper {
                position: relative;
                padding: 0 0 0 3vw;
            }

            .header-description-wrapper {
                width: 100%;
                padding-left: 3.5vw;
                padding-bottom: 1vh;
            }

            .header-description-wrapper h4 {
                font-weight: bold;
                font-size: 1.2em;
                text-transform: uppercase;
            }
        }

        .main-description-text {
            width: 38.5%;
            padding-top: 5vh;
            padding-right: 4vw;
            font-size: 15px;
            font-weight: 700;
        }
    }

    @media (max-width: 899px) {
        .main-description {
            .main-description-logo {
                width: 100%;
            }

            .main-description-text {
                width: 100%;
            }
        }
    }

</style>
