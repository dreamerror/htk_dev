<template>
    <div class="main-header-wrapper">

        <div class="main-header-content">
            <div class="main-header-berkut main-header-item desktop">
                <a href="/">
                    <img src="/storage/berkut.jpg" alt="Berkut">
                </a>
                <div class="berkut right">
                    <a href="tel:+74233130950">+7 (42331) 309-50</a>
                    <span>Перевозки «Беркут»</span>
                </div>
            </div>

            <div class="main-header-htk main-header-item">
                <a href="/">
                    <img src="/storage/htk.svg" alt="HTK">
                </a>
                <div class="htk right">
                    <a href="tel:+74232022521,+79025225000">
                        +7 423 202-25-21,
                        +7&nbsp;902&nbsp;522-50-00
                    </a>
                    <span>Склад временного хранения</span>
                </div>
            </div>

            <default-button
            :color="'#d1a251'"
            :text="'Заказать звонок'"
            propClass="desktop-only">

            </default-button>

        </div>

        <div class="main-header-nav mobile nav-item"
        @click="navBarHandler">
            Меню
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
                    @click="redirect(children.route)">
                        {{ children.title }}
                    </div>
                </div>

            </div>
        </div>


    </div>
</template>

<script>
// TODO: придумать как пересылать сообщения из формы "Заказать звонок"
export default {
    name: "HeaderMainComponent",
    props: {
      url: String
    },
    data() {
        return {
            navbarElements: [
                {title: "Склад временного хранения", route: "/temp-storage"},
                {title: "Таможенный представитель", route: "/customs"},
                {title: "Партнёры", route: "/partners"},
                {title: "Перевозки", route: "/transport", child: [
                        {title: "Грузовые", route: "/partners"},
                        {title: "Пассажирские", route: "/partners"},
                        {title: "Транзитные грузы", route: "/partners"},
                    ]},
                {title: "Информация", route: "/info"},
                {title: "Цены", route: "/prices"},
                {title: "Контакты", route: "/contacts"},
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
        flex-direction: column;
        width: 100%;
    }

    .main-header-content {
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: center;
        gap: 2vw;

        a {
            text-decoration: none;
        }

        img {
            width: 100px;
            height: 72px;
        }
    }

    .main-header-item {
        display: flex;
        flex-direction: row;
        align-items: center;
        gap: 1vw;

        span {
            font-size: 12px;
        }
    }

    .right {
        position: relative;
        display: flex;
        flex-direction: column;
        gap: 0.5vh;
        justify-content: center;
        align-items: center;
        padding-left: 15px;

        a {
            text-decoration: none;
            font-weight: bold;
            color: #000000;
            transition: all 0.3s linear;
        }

        a:hover {
            color: #d1a251;
        }
    }

    .right::before {
        content: '';
        position: absolute;
        left: 0;
        top: calc(50% - 16px);
        width: 1px;
        height: 35px;
        border: 1px solid #111;
        opacity: .5;
    }

    .main-header-nav {
        background: #316851;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 50px;
        padding: 0 3vw;
        box-shadow: 0 2px 3px rgb(0 0 0 / 18%);
    }

    .nav-item {
        position: relative;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5vw;
        color: #ffffff;
        height: 100%;
        transition: all .3s linear;
        cursor: pointer;
        padding: 0 2vw;

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
