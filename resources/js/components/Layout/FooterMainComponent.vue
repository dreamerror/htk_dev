<template>
    <div class="main-footer-wrapper">
            <img src="/storage/berkut-footer.svg" class="footer-berkut" alt="Berkut">
            <img src="/storage/htk-footer.svg" class="footer-htk" alt="HTK">

            <div class="footer-contacts">
                <span class="title">
                    Наш офис:
                </span>
                    <span class="address">
                        <i class="fa fa-map-marker"></i>
                        692715 Приморский край,
                    Хасанский район, <br> пгт. Краскино, ул. Ленина, 19
                </span>

            </div>

            <div class="footer-contacts">
                <span class="title">
                    СВХ:
                </span>
                <a href="mailto:Bulatov757@yandex.ru" class="address">
                    <i class="fa fa-envelope" aria-hidden="true"></i> Bulatov757@yandex.ru
                </a>

            </div>

            <div class="footer-contacts">
                <span class="title">
                    Перевозки «Беркут»:
                </span>
                <a href="mailto:Bulatov757@yandex.ru" class="address">
                    <i class="fa fa-envelope" aria-hidden="true"></i> Bulatov757@yandex.ru
                </a>

            </div>

            <div class="footer-contacts">
                <span class="title">
                    Таможенный представитель:
                </span>
                <span class="address">
                    <i class="fa fa-map-marker"></i>
                    г. Владивосток, ул.Светланская, 83, офис 301/1
                </span>
            </div>

    </div>

</template>

<script>
export default {
    name: "FooterMainComponent"
}

</script>

<style scoped lang="scss">

    .main-footer-wrapper {
        width: 100%;
        background: #316851;
        display: grid;
        grid-template-columns: 1fr 1fr repeat(4, 2fr);
        padding: 1vh 1vw;

        img {
            width: 50%;
            aspect-ratio: 1;
        }
    }

    //.main-footer-content {
    //    display: flex;
    //    flex-direction: row;
    //    justify-content: space-between;
    //    align-items: flex-start;
    //    padding-bottom: 1vh;
    //    flex-wrap: wrap;
    //
    //    .footer-berkut {
    //        width: 5%;
    //    }
    //
    //    .footer-htk {
    //        width: 12%;
    //        fill: #ffffff;
    //    }
    //}

    .footer-contacts {
        display: flex;
        flex-direction: column;
        gap: 1vh;

        .title {
            color: rgba(255,255,255,0.5);
            font-weight: 300;
            font-size: 16px;
        }

        .address {
            text-decoration: none;
            color: #ffffff;
            font-weight: 400;
            font-size: 16px;
            line-height: 24px;
            transition: all .3s linear;
        }

        a.address:hover {
            color: #d1a251
        }
    }

    .main-footer-copyright {
        color: rgba(255,255,255,0.5);
        font-size: 14px;
        font-weight: 400;
    }

    .main-footer-copyright::before {
        display: inline-block;
        content: "";
        border-top: .1vh solid #ffffff;
        width: 100%;
        transform: translateY(-1rem);
    }

</style>
