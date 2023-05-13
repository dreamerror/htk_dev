<template>
    <div class="main-wrapper">
        <div class="main-description">
            <h2>
                Хасанская транспортная компания
            </h2>
            <h3>
                Полноценный комплекс услуг в области внешнеэкономической деятельности
            </h3>
        </div>
        <main-card-list
        :cards="cards">

        </main-card-list>
    </div>
</template>

<script>
export default {
    name: "MainPageComponent",
    props: {
      cards: Array,
    },
}
</script>

<style scoped>

    .main-wrapper {
        display: flex;
        justify-content: space-around;
        gap: 5vh;
        flex-wrap: wrap;
        width: 100%;
        margin: 2vh auto;
    }

    .main-description {
        background-image: url('/storage/bg-berkut.jpg');
        background-size: 100% 100%;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 6vh 0;
        color: #ffffff;
    }

</style>
