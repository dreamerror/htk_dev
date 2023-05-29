<template>
    <div class="main-wrapper">
        <div class="main-bg">
            <img class="bg-image" src="/storage/bg/main-bg.jpg" alt="">

            <header-only-main
            :url="url">

            </header-only-main>
            <div class="main-description">
                <div class="main-description-logo">
                    <div class="main-image-wrapper desktop">
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

        .bg-image {
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity : 0.3;
            z-index: -100;
            object-fit: cover;
            mask-image: linear-gradient(#000 20%, transparent);
            mask-position: bottom;
        }
    }

    .main-wrapper {
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
        width: 100%;
    }

    .main-description {
        width: 100%;
        display: grid;
        grid-template-columns: 4fr 3fr;
        gap: 3vw;
        padding: 9vh 13vw 9vh 13vw;
        color: #111111;

        .main-description-logo {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            gap: 4vh;

            .button-wrapper {
                width: auto;
                height: auto;
                display: flex;
                justify-content: center;
                font-size: 18px;
                align-items: center;
                padding: 1px 5px;
                border: 1px solid #316851;
                font-family: 'Harmonia';
                color: #ffffff;
                background: #316851;
                cursor: pointer;
                border-radius: 5px;
                margin-right: auto;
                margin-bottom: 2vh;
            }

            .main-image-wrapper {
                position: relative;
            }

            .header-description-wrapper {
                width: 100%;
                //padding-left: 3.5vw;
            }

            .header-description-wrapper h4 {
                font-weight: bold;
                font-size: 1.4em;
                text-transform: uppercase;
                line-height: 1.5em;
            }
        }

        .main-description-text {
            //padding-top: 5vh;
            padding-left: 1vw;
            font-size: 1rem;
            font-weight: 400;
        }
    }

    @media (max-width: 899px) {
        .main-description {
            display: flex;
            flex-direction: column;

            .main-description-logo {
                display: flex;
                flex-direction: column;
                gap: 2vh;
            }
        }
    }

</style>
