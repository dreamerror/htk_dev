<template>
    <div class="page-wrapper">

        <div class="page-title">
            <h1>
                Таможенный представитель
            </h1>
        </div>

        <div class="page-description">
            <div class="page-documents">
                <img src="/storage/tp_prikaz.png" alt="">
                <p>
                    Приказ ФТС РФ от 14.02.2020 №13 "О включении в реестр таможенных представителей ООО
                    "Хасанская транспортная компания"
                </p>

                <download-button
                file="/storage/files/Preyskurant_na_uslugi_tam_predstavitelya_prikaz_05_ot_29.03.2023_.pdf"
                text="Прейскурант на услуги таможенного представителя"
                filename="Preyskurant_na_uslugi_tam_predstavitelya_prikaz_05_ot_29.03.2023_"
                ext="pdf">

                </download-button>

            </div>

            <div class="page-text">
                <p>
                    ООО "ХТК" включена в реестр таможенных представителей с 2014 года.
                </p>
                <p>
                    За прошедшие годы нами накоплен значительный опыт оформления различных товаров, перемещаемых как в импортном, так и в экспортном направлениях.
                </p>
                <p>
                    Сформирован коллектив профессионалов, которые способны решать любые вопросы, возникающие при перемещении товаров через таможенную границу.
                </p>
                <p>
                    Регион нашей деятельности распространяется на территорию всей Российской Федерации, компетенция позволяет работать с любыми категориями товаров.
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "TPPageComponent"
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
        background-image: url('/storage/tp.jpg');
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
    }

</style>
