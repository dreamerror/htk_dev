<template>
    <div class="page-wrapper">

        <div class="page-title">
            <h1>
                Склад временного хранения
            </h1>
        </div>

        <div class="page-description">
            <div class="page-documents">
                <img src="/storage/svh_svid.png" alt="">
                <p>
                    Свидетельство о включении в реестр владельцев складов временного хранения
                    №10716/031210/10053/8 от 12.12.2022 года выдано Уссурийской таможней.
                </p>

                <download-button
                    v-for="item in files"
                    :key="item.filename"
                    :file="item.file"
                    :text="item.text"
                    :filename="item.filename"
                    :ext="item.ext">

                </download-button>
            </div>

            <div class="page-text">
                <p>
                    ООО «Хасанская транспортная компания» включает в себя все необходимое для оказания услуг по
                    хранению товаров и транспортных средств различных видов, находящихся под таможенным
                    контролем до выпуска в соответствии с заявленной таможенной процедурой.
                </p>
                <p>
                    <strong>
                        Свидетельство  о включении в реестр владельцев
                    </strong>
                </p>
                <p>
                    <strong>
                        складов временного хранения
                    </strong>
                </p>
                <p>
                    <strong>
                        №10716/031210/10053/8
                    </strong>
                </p>

                <div class="page-table">
                    <table>
                        <tr>
                            <td>
                                <p>Тип склада:</p></td>
                            <td>
                                <p>Склад открытого хранения</p></td>
                        </tr>
                        <tr>
                            <td>
                                <p>Место нахождения:</p></td>
                            <td>
                                <p>Приморский край, Хасанский район, пгт.Краскино, ул.Ленина, д.48В</p></td>
                        </tr>
                        <tr>
                            <td>
                                <p>Общая площадь СВХ с прилегающей территорией:</p></td>
                            <td>
                                <p>20 200 кв.м.</p></td>
                        </tr>
                        <tr>
                            <td>
                                <p>Открытая бетонированная площадка:</p></td>
                            <td>
                                <p>4 800 кв.м.</p></td>
                        </tr>
                        <tr>
                            <td>
                                <p>Крытое складское помещение:</p></td>
                            <td>
                                <p>1 050 куб.м.</p></td>
                        </tr>
                        <tr>
                            <td>
                                <p>Техническое оснащение:</p></td>
                            <td>
                                <ul>
                                    <li>Пост весового контроля транспортных средств с пределом взвешивания до 60 тонн и длинной приемной платформы до 24 метров</li>
                                    <li>Вилочные автопогрузчики</li>
                                    <li>Электровесовое оборудование (автомобильные весы &quot;МАГНУС-60-24&quot;, электронные весы с пределами взвешивания до 3-х тонн, до 600 кг, до 150 кг, до 60 кг., до 20 кг.)</li>
                                    <li>Рентгеновская инспекционная система &laquo;CX100100TI&raquo; производства &laquo;NUCTECH COMPANY LIMITED&raquo;, КНР.</li>
                                    <li>Радиационный контроль: - Стационарная система радиационного контроля на въезде и выезде:&nbsp;Янтарь-2А, а также&nbsp;переносной прибор по РК: измеритель-сигнализатор поисковой ИСПМ-РМ1401-К-01-В</li></ul></td>
                        </tr>
                        <tr>
                            <td>
                                <p>Обеспечение сохранности:</p></td>
                            <td>
                                <p>Территория СВХ оборудована капитальным металлическим забором, ведется круглосуточное дежурство 2-х сторожей, установлена система видеонаблюдения.</p></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="page-title">
            <h1>
                Время работы СВХ
            </h1>
        </div>

        <div class="page-working-hours">
            <p><strong>Режим работы СВХ: ежедневно с 08-30 до 20-30.</strong></p>
            <p><strong>Диспетчер по приему заявок на прибытие, а также&nbsp;иных услуг
                СВХ, кладовщики СВХ, ежедневно с 08-30 до 20-30), </strong></p>
            <p><strong>тел.: +7&nbsp;902&nbsp;522-50-00&nbsp;</strong></p>
            <p><strong>Главный бухгалтер, с понедельника по пятницу&nbsp;с 09-00 до 18-00, </strong></p>
            <p><strong>тел.:&nbsp;+7 423 202-25-21</strong></p>
            <p><strong>Юрисконсульт, с понедельника по пятницу с 08-30 до 17-30,</strong></p>
            <p><strong>тел. +7 924 251-68-18.&nbsp;</strong></p>
        </div>

    </div>
</template>

<script>
export default {
    name: "SVHPageComponent",
    props: {
        url: String,
    },
    data() {
        return {
            files: [
                {
                    file: "/storage/files/Preyskurant_SVH_ot_24.06.2022g._utv_prikazom_8.pdf",
                    text: "Прейскурант СВХ от 24.06.2022г.",
                    filename: "Preyskurant_SVH_ot_24.06.2022g._utv_prikazom_8",
                    ext: "pdf"
                },
                {
                    file: "/storage/files/Forma_dogovora_okaz_skladskih_uslug_SVH_na_2021_2022god_s_parolem.pdf",
                    text: "Типовая форма договора складских услуг 2022г.",
                    filename: "Forma_dogovora_okaz_skladskih_uslug_SVH_na_2021_2022god_s_parolem",
                    ext: "pdf"
                },
                {
                    file: "/storage/files/Zayavlenie_na_razmeschenie_TS_s_tovarami_k_dogovoru_sklad_uslug_2021.doc",
                    text: "Заявление к договору складских услуг на прибытие ТС на СВХ",
                    filename: "Zayavlenie_na_razmeschenie_TS_s_tovarami_k_dogovoru_sklad_uslug_2021",
                    ext: "doc"
                },
                {
                    file: "/storage/files/Doverennost_k_dogovoru_skladskih_uslug_2021.doc",
                    text: "Рекомендуемая форма доверенности для работы с СВХ",
                    filename: "Doverennost_k_dogovoru_skladskih_uslug_2021",
                    ext: "doc"
                },
                {
                    file: "/storage/files/Prikaz_30_ot_09.11.2021_Ob_izmenenii_stoimosti_vet_kontrolya_na_SVH_2021.pdf",
                    text: "Стоимость услуг по размещ. ТС на территории СВХ для вет.контроля",
                    filename: "Prikaz_30_ot_09.11.2021_Ob_izmenenii_stoimosti_vet_kontrolya_na_SVH_2021",
                    ext: "pdf"
                },
            ]
        }
    }
}
</script>

<style scoped lang="scss">

    .page-wrapper {
        display: flex;
        flex-direction: column;
        padding: 5vh 15vw;
        gap: 3vh;
    }

    .page-title h1 {
        background-image: url('/storage/banner.png');
        font-weight: 700;
        color: #ffffff;
        display: flex;
        background-size: 100% 100%;
        justify-content: center;
        align-items: center;
        padding: 12vh 0;
    }

    .page-description {
        display: flex;
        flex-direction: row;
        gap: 2vw;
    }

    @media (max-width: 899px) {
        .page-description {
            flex-wrap: wrap;
        }
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
        font-size: 16px;
        font-weight: 400;
        line-height: 28px;

        display: flex;
        flex-direction: column;
        align-items: center;

        table tr td:first-child {
            max-width: 300px;
            padding-right: 20px;
            color: #0a0a0d;
            font-size: 14px;
            font-weight: 400;
            line-height: 18px;
        }

        table tr td:last-child {
            max-width: calc(100% - 300px);
            color: #0a0a0d;
            font-size: 14px;
            font-weight: 500;
            line-height: 18px;
        }
    }


</style>
