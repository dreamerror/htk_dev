<template>
    <div class="page-wrapper">

        <div class="page-title">
            <h1>

            </h1>
        </div>

        <div class="page-description">

            <div class="page-text">
                <p>
                    Являясь лицензированным таможенным перевозчиком наша компания может перевозить любые
                    транзитные грузы без внесения обеспечения уплаты таможенных платежей.
                </p>
                <p>
                    По вопросам обращаться:
                </p>
                <p>
                    Генеральный директор ООО "Беркут"
                </p>
                <p>
                    Машкин Александр Владимирович
                </p>
                <p>
                    тел.: +7 924 526-78-00
                </p>
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "TransitTransPageComponent"
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
        align-items: flex-start;
    }

</style>
