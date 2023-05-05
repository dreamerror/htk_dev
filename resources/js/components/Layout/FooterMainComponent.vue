<template>
    <div class="main-footer-wrapper">
        <div class="main-footer-content">
            <img src="/storage/berkut-footer.png" alt="Berkut">
            <img src="/storage/htk-footer.svg" alt="HTK">

            <div class="footer-contacts">
                <span class="title">
                    Наш офис:
                </span>
                    <span class="address">692715 Приморский край,
                    Хасанский район, <br> пгт. Краскино, ул. Ленина, 19
                </span>

                <span class="title">
                    Таможенный представитель:
                </span>
                <span class="address">
                    г. Владивосток, ул.Светланская, 83, офис 301/1
                </span>

            </div>

            <div class="footer-contacts">
                <span class="title">
                    Склад временного хранения:
                </span>
                <span class="address">
                    Bulatov757@yandex.ru
                </span>

            </div>

            <div class="footer-contacts">
                <span class="title">
                    Перевозки «Беркут»:
                </span>
                <span class="address">
                    Bulatov757@yandex.ru
                </span>

            </div>

        </div>

        <div class="main-footer-copyright">
            © 2019 OOO «Хасанская транспортная компания»
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
        display: flex;
        flex-direction: column;
        margin-top: 100%;
        padding: 1vh 1vw;
    }

    .main-footer-content {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: flex-start;
        padding-bottom: 1vh;
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

        .address {
            color: #ffffff;
            font-weight: 400;
            font-size: 16px;
            line-height: 24px;
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
