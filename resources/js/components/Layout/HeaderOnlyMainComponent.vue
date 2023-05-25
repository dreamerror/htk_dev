<template>
    <div class="main-header-wrapper">
        <div class="main-header-nav mobile nav-item"
        @click="navBarHandler">
            Меню
        </div>

        <img src="/storage/berkut-logo.svg" alt="" class="desktop berkut-logo"
             @click="redirect('')">

        <div class="main-menu-container">

        <div class="main-menu-wrapper">
            <div class="main-contacts">
                <div class="contact-elem">
                    <span>Перевозки "Беркут"</span>
                    <a href="tel:+74233130950">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        +7 42331 309-50
                    </a>
                </div>

                <div class="contact-elem">
                    <span>Склад временного хранения</span>
                    <a href="tel:+74232022521">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        +7 423 202-25-21
                    </a>
                    <a href="tel:+79025225000">
                        <i class="fa fa-phone" aria-hidden="true"></i>
                        +7 902 522-50-00
                    </a>
                </div>

                <div class="contacts-button">
                    Заказать обратный звонок
                </div>
            </div>

            <div class="main-header-nav desktop main-header-menu"
                 v-if="showNav">
                <div v-for="item in this.navbarElements"
                     class="nav-item"
                     :key="item.route"
                     @click="redirect(item.route)">
                    {{item.title}}

                    <i class="fa fa-chevron-down nav-arrow"
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



    </div>
</template>

<script>
// TODO: придумать как пересылать сообщения из формы "Заказать звонок"
export default {
    name: "HeaderOnlyMainComponent",
    props: {
      url: String
    },
    data() {
        return {
            navbarElements: [
                {title: "СВХ", route: "/temp-storage"},
                {title: "Таможенный представитель", route: "/customs"},
                {title: "Перевозки", route: "/transportation", child: [
                        {title: "Грузовые", route: "/cargo"},
                        {title: "Пассажирские", route: "/passengers"},
                        {title: "Транзитные грузы", route: "/transit"},
                    ]},
                {title: "Информация", route: "/info"},
                {title: "Партнёры", route: "/partners"},
                {title: "Контакты", route: "/contacts"},
                {title: "Цены", route: "/prices"},
            ],
            showNav: window.screen.width > 899,
        }
    },
    created() {
        window.addEventListener('resize', this.windowResizeHandler)
    },
    destroyed() {
        window.removeEventListener('resize', this.windowResizeHandler)
    },
    methods: {
        redirect(route) {
            window.location.href = `${this.url}${route}`

        },
        navBarHandler() {
            this.showNav = !this.showNav;
        },
        windowResizeHandler() {
            this.showNav = window.screen.width > 899;
        }
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
            font-size: 1.5em;
            cursor: pointer;
            border-radius: 50px;
        }
    }

    .contact-elem:first-child {
        margin-left: 2vw;
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
        }

        .main-header-menu {
            display: flex;
            flex-direction: column;
            height: auto;
            width: 100%;
            align-items: center;
            gap: 1vh;
            z-index: 100;
            transition: all .3s linear;
            padding: 1vh 0;
        }
    }

</style>
