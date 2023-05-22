<template>
    <div class="page-wrapper">
        <header-pages
            :bg_image="'/storage/banner.png'"
            :url="url">

            <template v-slot:description data-editable data-name="page-header">
                <h3>
                    ООО "Хасанская транспортная компания" включает в себя всё необходимое для оказания услуг по хранению
                    товаров и транспортных средств различных видов, находящихся под таможенным контролем до выпуска
                    в соответствии с заявленной таможенной процедурой.
                </h3>

                <div class="page-buttons-wrapper">
                    <div class="page-button"
                         v-for="item in [0,1,2,3,4]"
                         :key="item">

                    </div>
                </div>
            </template>

        </header-pages>

        <div class="page-content">
            <div class="doc-text">
                <div class="page-documents">
                    <img src="/storage/svh_svid.png" alt="" data-no-resize>
                </div>

                <div class="page-text" data-editable data-name="page-text">
                    <p class="title">
                        Свидетельство  о включении в реестр владельцев
                        складов временного хранения
                        №10716/031210/10053/8
                    </p>

                    <p>
                        Тип склада:
                    </p>

                    <p>
                        Склад открытого хранения
                    </p>

                    <p>
                        Место нахождения:
                    </p>

                    <p>Приморский край, Хасанский район, пгт.Краскино, ул.Ленина, д.48В</p>

                    <p>Общая площадь СВХ с прилегающей территорией:</p>

                    <p>20 200 кв.м.</p>

                    <p>Открытая бетонированная площадка:</p>

                    <p>4 800 кв.м.</p>

                    <p>Крытое складское помещение:</p>

                    <p>1 050 куб.м.</p>
                </div>
            </div>

            <div class="page-additional-info" data-editable data-name="page-additional">
                <p>Техническое оснащение:</p>
                <p>Пост весового контроля транспортных средств с пределом взвешивания до 60 тонн и длинной приемной платформы до 24 метров</p>
                <p>Вилочные автопогрузчики</p>
                <p>Электровесовое оборудование (автомобильные весы &quot;МАГНУС-60-24&quot;, электронные весы с пределами взвешивания до 3-х тонн, до 600 кг, до 150 кг, до 60 кг., до 20 кг.)</p>
                <p>Рентгеновская инспекционная система &laquo;CX100100TI&raquo; производства &laquo;NUCTECH COMPANY LIMITED&raquo;, КНР.</p>
                <p>Радиационный контроль: - Стационарная система радиационного контроля на въезде и выезде:&nbsp;Янтарь-2А, а также&nbsp;переносной прибор по РК: измеритель-сигнализатор поисковой ИСПМ-РМ1401-К-01-В</p>
                <p>
                    <h4>
                        РЕЖИМ РАБОТЫ СВХ:
                    </h4>
                </p>
                <p>ежедневно с 08-30 до 20-30</p>
                <p>Диспетчер по приему заявок на прибытие, а также иных услуг СВХ, кладовщики СВХ, ежедневно с 08-30 до 20-30),</p>

                <p>тел.: +7 902 522-50-00</p>

                <p>Главный бухгалтер, с понедельника по пятницу с 09-00 до 18-00,</p>

                <p>тел.: +7 423 202-25-21</p>

                <p>Юрисконсульт, с понедельника по пятницу с 08-30 до 17-30,</p>

                <p>тел. +7 924 251-68-18.</p>
            </div>

        </div>
    </div>
</template>

<script>
import {initEditor} from "../../inc/ContentTools/editor";

export default {
    name: "SVHPageComponent",
    props: {
        url: String,
        api: String,
    },
    mounted() {
        initEditor(this.api, this.setData)
    },
    methods: {
        setData(payload) {
            console.log(payload)
            return {
                page: 'svh',
                text: payload['page-text'],
                additional: payload['page-additional']
            }
        }
    }
}
</script>

<style scoped lang="scss">

    .page-wrapper {
        display: flex;
        flex-direction: column;
        gap: 3vh;
    }

    .page-buttons-wrapper {
        margin-top: 5vh;
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: center;
        gap: 2vw;
    }

    .page-button {
        text-transform: uppercase;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 25%;
        aspect-ratio: 4;
        padding: 1px 15px;
        border: 2px solid #d1a251;
        color: #d1a251;
        background: #d1a251;
        font-weight: bold;
        cursor: pointer;
        border-radius: 50px;
    }

    .header-bg:after {
        background-image: url("/storage/bg/svh.png");
    }

    .page-content {
        display: flex;
        flex-direction: column;
        gap: 2vh;
    }

    .doc-text {
        display: flex;
        flex-direction: row;
        justify-content: center;
        gap: 2vw;
    }

    .page-documents {
        max-width: 340px;
        display: flex;
        flex-direction: column;
        gap: 1vh;

        img {
            width: 100%;
            height: auto;
            box-shadow: 4px 6px 10px rgb(0 0 0 / 20%);
            border: 6px solid #fff;
        }

        p {
            position: relative;
            color: #0a0a0d;
            font-size: 12px;
            font-weight: 500;
            line-height: 18px;
        }

        p::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 98px;
            height: 2px;
            background: #316851;
        }
    }

    .page-text {
        width: 30%;

        display: flex;
        flex-direction: column;
        align-items: flex-start;
    }

    .title {
        font-size: 1.5rem;
        font-weight: 400;
        line-height: 28px;
        text-transform: uppercase;
    }

    .page-additional-info {
        padding: 0 22.5vw;
    }




</style>
