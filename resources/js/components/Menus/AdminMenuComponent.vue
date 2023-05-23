<template>
    <div class="admin-nav-wrapper">
        <div class="admin-nav-title">
            Навигация
        </div>
        <div class="admin-nav-button"
        @click="redirect('')">
            Домой
        </div>
        <div class="admin-nav-button">
            Карточки
        </div>
        <div class="admin-nav-button"
        @click="redirect('/backgrounds')">
            Задний фон страницы
        </div>
        <div class="admin-nav-button"
             @click="redirect('/documents')">
            Отображаемые документы
        </div>
        <div class="admin-nav-button"
             @click="redirect('/contacts')">
            Контакты
        </div>
    </div>
</template>

<script>
export default {
    name: "AdminMenuComponent",
    props: {
        url: String,
    },
    methods: {
        redirect(route) {
            window.location.href = this.url + route;
        }
    }
}
</script>

<style scoped>
    .admin-nav-wrapper {
        position: fixed;
        width: 13%;
        height: 100%;
        left: 0;
        box-shadow: 2px 0 5px black;
        background: #a19e9e;
        display: flex;
        flex-direction: column;
        gap: 1vh;
    }

    .admin-nav-title {
        padding: 0.5vh 0.2vw;
        text-align: center;
        vertical-align: middle;
        color: white;
        font-weight: bold;
        background: black;
    }

    .admin-nav-button {
        cursor: pointer;
        padding: 0.5vh 0.2vw;
        text-align: center;
        vertical-align: middle;
        color: white;
        font-weight: bold;
        transition: background-color .3s linear;
    }

    .admin-nav-button:hover {
        background: black;
    }
</style>
