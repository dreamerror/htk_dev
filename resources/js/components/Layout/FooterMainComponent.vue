<template>
    <div class="main-footer-wrapper">
            <img src="/storage/berkut-footer.svg" class="footer-berkut" alt="Berkut">
            <img src="/storage/htk-footer.svg" class="footer-htk" alt="HTK">

            <div class="footer-contacts">
                <span class="title">
                    Наш офис:
                </span>
                    <span class="ce-address">
                        692715 Приморский край,
                    Хасанский район, <br> пгт. Краскино, ул. Ленина, 19
                </span>

            </div>

            <div class="footer-contacts">
                <span class="title">
                    СВХ:
                </span>
                <a href="mailto:Bulatov757@yandex.ru" class="ce-email">
                    <i class="fa fa-envelope" aria-hidden="true"></i> Bulatov757@yandex.ru
                </a>

            </div>

            <div class="footer-contacts">
                <span class="title">
                    Перевозки «Беркут»:
                </span>
                <a href="mailto:Bulatov757@yandex.ru" class="ce-email">
                    <i class="fa fa-envelope" aria-hidden="true"></i> Bulatov757@yandex.ru
                </a>

            </div>

            <div class="footer-contacts">
                <span class="title">
                    Таможенный представитель:
                </span>
                <span class="ce-address">
                    г. Владивосток, ул.Светланская, 83, офис 301/1
                </span>
            </div>

    </div>

</template>

<script>
export default {
    name: "FooterMainComponent",
    mounted() {
        const addressIcon = "<i class=\"fa fa-map-marker\" aria-hidden=\"true\"></i>"
        const allAddresses = document.getElementsByClassName('ce-address')
        for (let address of allAddresses) {
            address.insertAdjacentHTML('afterbegin', addressIcon)
        }
    }
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

    .footer-contacts {
        display: flex;
        flex-direction: column;
        gap: 1vh;

        .title {
            color: rgba(255,255,255,0.5);
            font-weight: 300;
            font-size: 16px;
        }

        [class^='ce-'] {
            text-decoration: none;
            color: #ffffff;
            font-weight: 400;
            font-size: 16px;
            line-height: 24px;
            transition: all .3s linear;
        }

        a[class^='ce-']:hover {
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
