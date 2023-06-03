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
                            {{ translations.title[this.$store.state.lang] }}
                        </h4>
                    </div>

                    <div class="button-wrapper">
                        {{ translations.about[this.$store.state.lang] }}
                    </div>
                </div>

                <div class="main-description-text">
                    <p>
                        {{ translations.block_1[this.$store.state.lang] }}
                    </p>
                    <p>
                        {{ translations.block_2[this.$store.state.lang] }}
                    </p>
                    <p>
                        {{ translations.block_3[this.$store.state.lang] }}
                    </p>
                    <p>
                        {{ translations.block_4[this.$store.state.lang] }}
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
    data() {
        return {
            translations: {
                about: {ru: 'ПОДРОБНЕЕ', cn: '简介'},
                title: {ru: 'Полноценный комплекс услуг в области внешнеэкономической деятельности', cn: '提供外贸领域全面服务'},
                block_1: {ru: 'Наши специалисты обеспечат эффективную доставку автомобильным транспортом ' +
                        'Ваших товаров до двери, взяв на себя все формальности с перевозкой, хранением ' +
                        'на складе временного хранения (СВХ) и таможенным оформлением, оформим транзитные грузы',
                    cn: '金雕国际运输公司确保有效货物车运，' +
                        '保证门到门送取货，办理所有运输手续，提供监管库和清关，处理过境货物服务。'},
                block_2: {ru: 'Обращаясь к нам, Вы получаете гарантию нашими финансовыми обязательствами перед таможенными ' +
                        'органами по таможенным платежам и возмещению ущерба при утрате по ' +
                        'страхованию гражданской ответственности',
                    cn: '选金雕国际运输公司您可以全放心，因公司对海关费用和民事责任采用自己的金融资产担保。'},
                block_3: {ru: 'Не являясь крупной корпорацией, отягощенной бюрократическим аппаратом, ' +
                        'мы индивидуально подходим к каждому клиенту и оказываем услуги в более минимальные сроки',
                    cn: '因公司不是一个大集团公司，不受大官僚机构的负担，那可对每个客户个别对待，尽速提供服务。'},
                block_4: {ru: 'ООО «Хасанская транспортная компания» является владельцем склада временного хранения ' +
                        'и оказывает услуги в данной области согласно действующему законодательству. На территории ' +
                        'склада присутствует вся необходимая материально-техническая база для выполнения работ ' +
                        'любой сложности с Вашим грузом.',
                    cn: '哈桑运输有限公司是监管库的所有者，并在此淋雨根据现行法规提供相关的服务。该仓库拥有所有必要的物流设施，' +
                        '可以对您的货物进行所需处理工作。'},
            }
        }
    }
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
