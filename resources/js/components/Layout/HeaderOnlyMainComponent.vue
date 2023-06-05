<template>
    <div class="main-header-wrapper">

        <img src="/storage/berkut-logo.svg" alt="" class="desktop berkut-logo"
             @click="redirect('')">

        <div class="main-menu-container">

            <div class="main-menu-wrapper">
                <div class="main-contacts desktop">
                    <div class="mobile berkut-logo">
                        <img src="/storage/berkut-logo.svg" alt=""
                             @click="redirect('')">
                    </div>
                    <div class="contact-elem">
                        <span>{{ translations.berkut[this.$store.state.lang] }}</span>
                        <a href="tel:+74233130950">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            +7 42331 309-50
                        </a>
                    </div>

                    <div class="contact-elem contact-elem-last">
                        <span>{{ translations.svh_full[this.$store.state.lang] }}</span>
                        <a href="tel:+74232022521">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            +7 423 202-25-21
                        </a>
                        <a href="tel:+79025225000">
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            +7 902 522-50-00
                        </a>
                    </div>

                    <div class="contacts-button" ref="text-block" @click="showModal = true">
                        {{ translations.call[this.$store.state.lang] }}
                    </div>

                    <div class="lang-switch" @click="switchLanguage">
                        <img src="/storage/flags/cn.png" alt="" v-if="this.$store.state.lang === 'ru'">
                        <img src="/storage/flags/ru.png" alt="" v-if="this.$store.state.lang === 'cn'">
                    </div>
                </div>

                <div class="header-image-wrapper mobile">
                    <img src="/storage/htk-logo-color-main.svg" class alt=""
                         @click="redirect('')">
                </div>

                <div class="contacts-button mobile" ref="text-block" @click="showModal = true">
                    {{ translations.call[this.$store.state.lang] }}
                </div>

                <div class="lang-switch mobile" @click="switchLanguage">
                    <img src="/storage/flags/cn.png" alt="" v-if="this.$store.state.lang === 'ru'">
                    <img src="/storage/flags/ru.png" alt="" v-if="this.$store.state.lang === 'cn'">
                </div>

                <div class="main-header-nav main-header-menu">
                    <div v-for="item in this.navbarElements"
                         class="nav-item"
                         :key="item.route"
                         @click="redirect(item.route)">
                        {{item.title}}

                        <i class="fa fa-chevron-down nav-arrow desktop"
                           aria-hidden="true"
                           v-if="item.child"></i>

                        <div class="main-header-dropdown"
                             v-if="item.child">
                            <div class="header-dropdown-item"
                                 v-for="children in item.child"
                                 :key="children.route"
                                 @click.stop="redirect(`${item.route}${children.route}`)">
                                {{ children.title }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <modal-window
        :api="'/'"
        v-if="showModal"
        @close-modal="showModal = false">

        </modal-window>

    </div>
</template>

<script>
// TODO: придумать как пересылать сообщения из формы "Заказать звонок"
export default {
    name: "HeaderOnlyMainComponent",
    props: {
        url: String,
    },
    data() {
        return {
            translations: {
                svh: {ru: 'СВХ', cn: '监管库'},
                tp: {ru: 'Таможенный представитель', cn: '报关代理'},
                transport: {ru: 'Международные перевозки', cn: '国际运输'},
                cargo: {ru: 'Грузовые', cn: '货运'},
                passengers: {ru: 'Пассажирские', cn: '客运'},
                info: {ru: 'Информация', cn: '公司信息'},
                partners: {ru: 'Партнеры', cn: '合作伙伴'},
                contacts: {ru: 'Контакты', cn: '联系我们'},
                prices: {ru: 'Цены', cn: '询价'},
                berkut: {ru: 'Перевозки "Беркут"', cn: '金雕国际运输公司'},
                svh_full: {ru: 'Склад временного хранения', cn: '监管库'},
                call: {ru: 'Заказать обратный звонок', cn: '要求电话回拨'},
            },
            showModal: false,
        }
    },
    computed: {
        navbarElements() {
            return [
                {title: this.translations.svh[this.$store.state.lang], route: "/temp-storage"},
                {title: this.translations.tp[this.$store.state.lang], route: "/customs"},
                {title: this.translations.transport[this.$store.state.lang], route: "/transportation", child: [
                        {title: this.translations.cargo[this.$store.state.lang], route: "/cargo"},
                        {title: this.translations.passengers[this.$store.state.lang], route: "/passengers"}
                    ]},
                {title: this.translations.info[this.$store.state.lang], route: "/info"},
                {title: this.translations.partners[this.$store.state.lang], route: "/partners"},
                {title: this.translations.contacts[this.$store.state.lang], route: "/contacts"},
                {title: this.translations.prices[this.$store.state.lang], route: "/prices"},
            ]
        }
    },
    methods: {
        redirect(route) {
            window.location.href = `${this.url}${route}`
        },
        getCookie(name) {
            let val = document.cookie
                .split('; ')
                .find((row) => row.startsWith(`${name}=`))
            if (val) {
                return val.split('=')[1]
            } else {
                document.cookie = 'lang=ru; path=/'
                return 'ru';
            }
        },
        replaceValueInCookie(newVal) {
            document.cookie = newVal
        },
        switchLanguage() {
            const lang = this.getCookie('lang');
            const newLang = lang === 'ru' ? 'cn' : 'ru';
            this.replaceValueInCookie(`lang=${newLang}; path=/`)
            this.$store.commit('switchLang');
            window.location.reload();
        },
        checkOverflow() {
            const el = this.$refs["text-block"];
            let curOverflow = el.style.overflow;
            if (!curOverflow || curOverflow === "visible") {
                el.style.overflow = "hidden";
            }
            let isOverflowing =
                el.clientWidth < el.scrollWidth || el.clientHeight < el.scrollHeight;
            el.style.overflow = curOverflow;
            return isOverflowing;
        },
        adjustFontSize() {
            let fitted = false
            let lastSize
            const increment = 0.05;
            const el = this.$refs["text-block"];

            el.style.fontSize = "0.1em";

            while (!fitted) {
                if (this.checkOverflow() || parseFloat(el.style.fontSize.slice(0, -2)) > 1.5) {
                    el.style.fontSize = `${lastSize - increment}em`
                    fitted = true
                } else {
                    lastSize = parseFloat(el.style.fontSize.slice(0, -2)) + increment
                    el.style.fontSize = `${lastSize}em`
                }
            }

        }
    },
    beforeMount() {
        if (this.getCookie('lang') !== this.$store.state.lang) {
            this.$store.commit('switchLang');
        }
    },
    mounted() {
        this.adjustFontSize();
    }
}
</script>

<style scoped lang="scss">
    .main-header-wrapper {
        display: flex;
        flex-direction: row;
        justify-content: flex-start;
        align-items: flex-end;
        width: 100%;
        //margin-bottom: 2vh;
        padding: 3vh 13vw 0 3.5vw;
        gap: 2.5vw;
        //gap: 7vw;
    }

    .lang-switch {
        cursor: pointer;
        height: calc(40px + 2.5em);
        aspect-ratio: 1;

        align-self: center;

        img {
            height: inherit;
            width: inherit;
        }
    }

    .berkut-logo {
        width: 7vw;
        aspect-ratio: 1.5;
        cursor: pointer;
    }

    .main-menu-container {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .main-contacts {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: flex-start;
        width: 100%;

        .contact-elem {
            display: flex;
            flex-direction: column;

            span {
                text-transform: uppercase;
                margin-bottom: 0.25rem;
                font-size: 1rem;
                font-weight: 400;
            }

            a {
                text-decoration: none;
                color: #111111;
                font-size: 1rem;
                font-weight: 400;
                //width: auto;
                max-width: max-content;
            }
        }

        .contacts-button {
            text-transform: uppercase;
            display: flex;
            justify-content: center;
            align-items: center;
            //height: 90px;
            width: auto;
            padding: 20px 60px;
            border: 3px solid #ffffff;
            color: #ffffff;
            font-weight: 400;
            white-space: nowrap;
            cursor: pointer;
            border-radius: 50px;
            box-shadow: 0 0 5px 0 black;
            text-shadow: 0 0 10px #000000;
        }
    }

    .main-menu-wrapper {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: flex-end;
        gap: 6vh;
        width: 100%;
    }

    .main-header-nav {
        background: #316851;
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
        //gap: 10px;
        border-radius: 30px;
        height: 45px;
        box-shadow: 0 2px 3px rgb(0 0 0 / 18%);
    }

    .nav-item {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.1em;
        width: auto;
        //padding: 0 2.155vw;
        flex-grow: 1;
        color: #ffffff;
        height: 100%;
        transition: all .3s linear;
        cursor: pointer;
        text-transform: uppercase;

        .nav-arrow {
            transition: all .3s linear;
        }

        .main-header-dropdown {
            position: absolute;
            display: none;
            z-index: 100;
            top: 100%;
            left: 0;
            right: 0;
            border-bottom: 3px solid #d1a251;
            background: #fff;
            width: inherit;
            padding: 0 0.5vw;

            .header-dropdown-item {
                border-bottom: 1px solid rgba(112,112,112,0.15);
                color: #111;
                font-size: 14px;
                font-weight: 400;
                transition: all .3s linear;
            }
        }
    }

    @media (max-width: 900px) {
        .nav-item {
            padding: 0;
        }
    }

    .nav-item:first-child {
        //width: 100%;
        //margin-right: auto;
        border-radius: 30px 0 0 30px;
    }

    .nav-item:last-child {
        //margin-left: auto;
        border-radius: 0 30px 30px 0;
        background: #d1a251;
    }

    .nav-item:nth-last-child(2) {
        background: #d1a251;
    }

    .nav-item:hover {
        background: #d1a251;

        .nav-arrow {
            transform: rotate(180deg);
        }

        .main-header-dropdown {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5vh;

            .header-dropdown-item:hover {
                color: #d1a251;
            }
        }
    }

    @media (min-width: 900px) {
        .mobile {
            display: none;
        }
    }

    @media (max-width: 899px) {
        .desktop {
            display: none;
        }

        .main-header-wrapper {
            flex-direction: column;
            padding: 3vh 3.5vw 0 3.5vw;
        }

        .header-image-wrapper {
            cursor: pointer;
        }

        .contacts-button {
            text-transform: uppercase;
            display: flex;
            justify-content: center;
            align-items: center;
            //height: 90px;
            width: 100%;
            padding: 20px 60px;
            border: 3px solid #ffffff;
            color: #ffffff;
            white-space: nowrap;
            font-weight: 400;
            font-size: 1.5em;
            cursor: pointer;
            border-radius: 50px;
            box-shadow: 0 0 5px 0 black;
            text-shadow: 0 0 10px #000000;
        }

        .header-image-wrapper img {
            width: 100%;
            aspect-ratio: 2;
        }

        .main-header-nav {
            display: flex;
            flex-direction: column;
            height: auto;
            flex-grow: 1;
            width: 100%;
            align-items: center;
            z-index: 100;
            transition: all .3s linear;
            border-radius: 10px;
        }

        .main-menu-wrapper {
            align-items: center;
            gap: 3vh;
        }

        .contact-elem-last {
            grid-column: 1 / span 2;
            //justify-self: center;
        }

        .nav-item {
            width: 100%;
            height: 100%;
            background: #316851;
        }

        .nav-item:first-child {
            border-radius: 10px 10px 0 0;
        }

        .nav-item:last-child {
            border-radius: 0 0 10px 10px;
        }

        .nav-item:hover {
            .main-header-dropdown {
                display: none;
            }
        }
    }

</style>
