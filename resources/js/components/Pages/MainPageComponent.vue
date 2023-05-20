<template>
    <div class="main-wrapper">
        <div class="main-bg">
            <header-only-main>

            </header-only-main>
            <div class="main-description">
                <div class="main-description-logo">
                    <img src="/storage/htk-logo-color-main.svg" alt="">
                    <h2>
                        Полноценный комплекс услуг <br/> в области внешнеэкономической деятельности
                    </h2>
                    <default-button
                    color="#316851"
                    text="Подробнее"
                    propClass="bg-color">

                    </default-button>
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
        background-image: url('/storage/main-bg.jpg');
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
        width: 100%;
        height: 100%;
        opacity : 0.3;
        z-index: -100;
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
        padding: 10vh 15vw 35vh 15vw;
        color: #111111;

        .button-wrapper {
            width: 20%;
        }

        .main-description-logo {

            display: flex;
            flex-direction: column;
            width: 50%;
            gap: 2vh;

            img {
                height: 100%;
                aspect-ratio: 2;
                position: relative;
                padding: 1vh 0 1vh 3vw;
                border-bottom: 1px solid black;
            }

            h2 {
                border-bottom: 1px solid black;
                width: 100%;
                font-weight: bold;
                padding-left: 2.5vw;
                padding-bottom: 1vh;
            }
        }

        .main-description-text {
            width: 40%;
            padding-top: 3vh;
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
