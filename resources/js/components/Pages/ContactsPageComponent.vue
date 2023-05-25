<template>
    <div class="contacts-wrapper">

        <header-pages
            :bg_image="'/storage/bg/svh.png'"
            :url="url"
            :content="pageDescription">

        </header-pages>

        <contacts-item-element
        title="ООО «Хасанская транспортная компания»"
        :items="htkItem">

            <template v-slot:map>
                <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;um=constructor%3Aa613d88d0f8545c9c27e046ca73c780297c9226aea9d2b138bb27059b4d29960"
                        frameborder="0" allowfullscreen="true" width="100%" height="300px" style="display: block;">

                </iframe>
            </template>

        </contacts-item-element>

        <contacts-item-element
        title="Склад временного хранения (СВХ)"
        :items="svhItem">

            <template v-slot:map>
                <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;um=constructor%3Ae2f63bcc667adf962cca588dd74b7bde9bff30687ef8f1a5ad92a36a82e482c0"
                        frameborder="0" allowfullscreen="true" width="100%" height="300px" style="display: block;">

                </iframe>
            </template>

        </contacts-item-element>

        <contacts-item-element
        title="Таможенный представитель"
        :items="tpItem" />

        <contacts-item-element
        title="Дополнительная информация"
        :items="additionalItem" />

    </div>
</template>

<script>
import ContactsItemElement from "../Cards/ContactsItemElement.vue";

export default {
    name: "ContactsPageComponent",
    components: {ContactsItemElement},
    props: {
        url: String,
        page_data: {
            type: Object,
            default: () => {
                return {
                    'page_description': '',
                }
            }
        }
    },
    computed: {
        pageDescription() {
            return this.page_data['page_description'];
        }
    },
    data() {
        return {
            htkItem: [
                {title: "", text: "ОГРН 1042502751697, ИНН 2531010000, КПП 253101001"},
                {title: "Юридический/почтовый адрес:", text: "692715, " +
                        "Приморский край, Хасанский район, пгт.Краскино, ул. Ленина, 19."},
                {title: "Генеральный директор:", text: "Булатов Антон Олегович"},
                {title: "E-mail:", text: "Bulatov757@yandex.ru"},
            ],
            svhItem: [
                {title: "Фактический адрес расположения СВХ:", text: "Приморский край, " +
                        "Хасанский район, пгт.Краскино, ул.Ленина, д.48В."},
                {title: "Офис СВХ:", text: "Тел./Факс: +7 423 202-25-21, +7 902 522-50-00"},
                {title: "Контрольно-пропускной пункт СВХ:", text: "Тел.:"},
                {title: "Директор СВХ:", text: "Лебедев Денис Эдуардович\n" +
                        "Тел.: +7 423 202-25-21, +7 902 522-50-00"},
                {title: "Юрисконсульт:", text: "Бирюков Юрий Леонидович\n" +
                        "Тел.: +7 924 251 68 18\n" +
                        "E-mail: htklaw75@mail.ru"},
                {title: "Главный бухгалтер:", text: "E-mail: skladsvkh@mail.ru"},
                {title: "Кладовщики:", text: "E-mail: kladovshik_svkh.htk@mail.ru"},
            ],
            tpItem: [
                {title: "", text: "Тел.: +7 914 795-56-41\n" +
                        "E-mail: customs@htk25rus.ru"},
                {title: "Офис таможенного представителя:", text: "г.Владивосток, ул.Светланская, 83, оф 301/1"}
            ],
            additionalItem: [
                {title: "ОСТП №1 Уссурийского таможенного поста Уссурийской таможни:",
                    text: "Тел./Факс: +7 (423) 202-25-23, +7 (423) 202-25-24"}
            ]
        }
    }
}
</script>

<style scoped lang="scss">

    .contacts-wrapper {
        display: flex;
        flex-direction: column;
        gap: 3vh;
        //padding: 5vh 10vw;
    }

</style>
