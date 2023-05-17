<template>
    <div class="page-wrapper">

        <div class="page-title">
            <h1>
                Грузовые перевозки
            </h1>
        </div>

        <div class="page-description">
            <div class="page-documents">
                <img src="/storage/cargo_svid.jpg" alt="">
                <p>
                    Свидетельство о включении в реестр таможенных перевозчиков
                </p>

            </div>

            <div class="page-text">
                <p>
                    ООО "Беркут" работает на рынке транспортных услуг уже более 27 лет.
                </p>
                <p>
                    Компания является таможенным перевозчиком с обширным автомобильным парком.
                </p>
                <p>
                    В распоряжении компании 37 тягачей и 57 единиц прицепного состава, среди которых:
                </p>

                <ul>
                    <li>8 рефрижераторных фургонов, позволяющих перевозить замороженную продукцию;</li>
                    <li>7 контейнеров для перевозки живого краба;</li>
                    <li>20 фургонов различной вместительности и грузоподъемности;</li>
                    <li>15 контейнеровозов;</li>
                    <li>5 полуприцепов площадного типа;</li>
                    <li>2 трала.</li>
                </ul>

                <p>
                    Компания дислоцируется на базе собственных гаражей один из которых расположен в
                    непосредственной близости к государственной границе с Китаем
                    (п. Краскино, Хасанский район, 24 километра от границы), второй в пригороде Владивостока.
                </p>

                <p>
                    В число наших давних и надежных партнеров входят логистические компании провинции Цзилинь,
                    организующих складскую обработку и таможенную очистку товаров  на территории Китая.
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CargoTransPageComponent"
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
    }

</style>
