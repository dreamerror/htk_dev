<template>
    <div class="main-header-wrapper">

        <div class="main-header-content">
            <div class="main-header-berkut main-header-item">
                <a href="/">
                    <img src="/storage/berkut.jpg" alt="Berkut">
                </a>
                <div class="berkut right">
                    <a href="tel:+74233130950">+7 (42331) 309-50</a>
                    <span>Перевозки "Беркут"</span>
                </div>
            </div>

            <div class="main-header-htk main-header-item">
                <a href="/">
                    <img src="/storage/htk.svg" alt="HTK">
                </a>
                <div class="htk right">
                    <a href="tel:+74232022521,+7&nbsp;902&nbsp;5225000">
                        +7 423 202-25-21,
                        +7&nbsp;902&nbsp;522-50-00
                    </a>
                    <span>Склад временного хранения</span>
                </div>
            </div>

            <default-button
            :color="'#d1a251'"
            :text="'Заказать звонок'">

            </default-button>

        </div>

        <div class="main-header-nav">
            <div v-for="item in this.navbarElements"
            class="nav-item"
            :key="item.route"
            @click="redirect(item.route)">
                {{item.title}}
            </div>
        </div>

    </div>
</template>

<script>
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
                {title: "Экспресс-грузы", route: "/express"},
                {title: "Информация", route: "/info"},
                {title: "Цены", route: "/prices"},
                {title: "Контакты", route: "/contacts"},
            ]
        }
    },
    methods: {
        redirect(route) {
            window.location.href = `${this.url}${route}`
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
        display: flex;
        justify-content: center;
        align-items: center;
        color: #ffffff;
        height: 100%;
        transition: all .3s linear;
        cursor: pointer;
        padding: 0 1vw;
    }

    .nav-item:hover {
        background: #d1a251;
    }

</style>
