<template>
    <div class="main-wrapper">
        <main-card
        v-for="card in this.cards"
        :key="card.title"
        :title="card.title"
        :src="card.src"
        :description="card.description"
        :route="card.route">

        </main-card>
    </div>
</template>

<script>
export default {
    name: "MainPageComponent",
    data() {
      return {
          cards: [
              {title: "Склад временного хранения", src: "/storage/storage.jpg", description: "Наши специалисты обеспечат эффективную доставку автомобильным транспортом Ваших товаров до \"двери\", взяв на себя все формальности с перевозкой, хранением на СВХ и таможенным оформлением, оформим транзитные грузы.", route: "/temp-storage"},
              {title: "Таможенный представитель", src: "/storage/tp.jpg", description: "Не смотря на то, что таможенным законодательством каждому из нас предоставлено право самостоятельно декларировать свои товары, эта процедура сопряжена с многими сложностями. Поэтому, чтобы избежать неоправданной потери времени, денег, нервов обращайтесь к профессионалам.", route: "/customs"},
              {title: "Перевозки", src: "/storage/transportation.jpg", description: "Наши специалисты обеспечат эффективную доставку автомобильным транспортом Ваших товаров до \"двери\", взяв на себя все формальности с перевозкой, хранением на СВХ и таможенным оформлением, оформим транзитные грузы.", route: "/transportation"},
              {title: "Экспресс-грузы", src: "/storage/express.jpg", description: "Наши специалисты обеспечат эффективную доставку автомобильным транспортом Ваших товаров до \"двери\", взяв на себя все формальности с перевозкой, хранением на СВХ и таможенным оформлением, оформим транзитные грузы.", route: "/express"},
          ]
      }
    },
}
</script>

<style scoped>

    .main-wrapper {
        display: flex;
        justify-content: space-around;
        gap: 5vh;
        flex-wrap: wrap;
        width: 80%;
        box-shadow: 0 5px 10px 2px black;
        padding: 2vh 2vw;
        margin: 2vh auto;
    }

</style>
