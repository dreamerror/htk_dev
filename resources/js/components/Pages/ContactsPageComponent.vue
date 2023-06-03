<template>
    <div class="contacts-wrapper">

        <header-pages
            :bg_image="'/storage/bg/contacts.jpg'"
            :url="url"
            :content="pageDescription">

        </header-pages>

        <div class="page-content">
            <contacts-item-element
                :title="htk.title"
                :items="htk.item"
                :show-map="true">

                <template v-slot:map>
                    <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;um=constructor%3A840eb19f3008a4b16fe71bdff33882375194059076c15bbb9f43b7cf0297f192"
                            frameborder="0" allowfullscreen="true" width="100%" height="300px" style="display: block;">

                    </iframe>
                </template>

            </contacts-item-element>

            <contacts-item-element
                :title="svh.title"
                :items="svh.item"
                :show-map="true">

                <template v-slot:map>
                    <iframe src="https://yandex.ru/map-widget/v1/?lang=ru_RU&amp;scroll=true&amp;um=constructor%3Ae2f63bcc667adf962cca588dd74b7bde9bff30687ef8f1a5ad92a36a82e482c0"
                            frameborder="0" allowfullscreen="true" width="100%" height="300px" style="display: block;">

                    </iframe>
                </template>

            </contacts-item-element>

            <contacts-item-element
                :title="tp.title"
                :items="tp.item" />

            <contacts-item-element
                :title="additional.title"
                :items="additional.item" />
        </div>

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
    data() {
        return {
            htkItem: [
                {title: "", text: "ОГРН 1042502751697, ИНН 2531010000, КПП 253101001"},
                {title: "Юридический/почтовый адрес:", text: "692715, " +
                        "Приморский край, Хасанский район, пгт.Краскино, ул. Ленина, 19."},
                {title: "Генеральный директор:", text: "Булатов Антон Олегович"},
                {title: "E-mail:", text: "Bulatov757@yandex.ru"},
            ],

            htkItemCn: [
                {title: "", text: "基本国家注册号 1042502751697, 纳税人识别号码 2531010000, 纳税人登记原因代码253101001 "},
                {title: "注册/邮寄地址:", text: "692715，滨海边疆区，哈桑区，克拉斯基诺，列宁街19"},
                {title: "总经理:", text: "安东-布拉托夫 "},
                {title: "电子邮件:", text: "Bulatov757@yandex.ru"},
            ],

            svhItem: [
                {title: "Фактический адрес расположения СВХ:", text: "Приморский край, " +
                        "Хасанский район, пгт.Краскино, ул.Ленина, д.48В."},
                {title: "Офис СВХ:", text: "Тел./Факс: +7 423 202-25-21, +7 902 522-50-00"},
                {title: "Директор СВХ:", text: "Лебедев Денис Эдуардович\n" +
                        "Тел.: +7 423 202-25-21, +7 902 522-50-00"},
                {title: "Юрисконсульт:", text: "Бирюков Юрий Леонидович\n" +
                        "Тел.: +7 924 251 68 18\n" +
                        "E-mail: htklaw75@mail.ru"},
                {title: "Главный бухгалтер:", text: "E-mail: skladsvkh@mail.ru"},
                {title: "Кладовщики:", text: "E-mail: kladovshik_svkh.htk@mail.ru"},
            ],

            svhItemCn: [
                {title: "监管库实际地址:", text: "滨海边疆区，克拉斯基诺，哈桑区，列宁街48В"},
                {title: "监管库办公室:", text: "电话/传真：+7 423 202-25-21，+7 902 522-50-00 "},
                {title: "监管库总经理:", text: "丹尼斯-列别杰夫 电话：+7 423 202-25-21, +7 902 522-50-00"},
                {title: "律师:", text: "尤里-比尔尤科夫 \n" +
                        "电话: +7 924 251 68 18\n" +
                        "电子邮件: htklaw75@mail.ru"},
                {title: "总会计:", text: "电子邮件: skladsvkh@mail.ru"},
                {title: "仓库管理员:", text: "电子邮件: kladovshik_svkh.htk@mail.ru"},
            ],

            tpItem: [
                {title: "", text: "Тел.: +7 914 795-56-41\n" +
                        "E-mail: customs@htk25rus.ru"},
                {title: "Офис таможенного представителя:", text: "г. Владивосток, Океанский проспект, 24. Офис 316."}
            ],

            tpItemCn: [
                {title: "", text: "电话: +7 914 795-56-41\n" +
                        "电子邮件: customs@htk25rus.ru"},
                {title: "报关代理办公室:", text: "符拉迪沃斯托克，奥凯安斯基大街24，316办公室"}
            ],

            additionalItem: [
                {title: "ОСТП №1 Уссурийского таможенного поста Уссурийской таможни:",
                    text: "Тел./Факс: +7 (423) 202-25-23, +7 (423) 202-25-24"}
            ],

            additionalItemCn: [
                {title: "乌苏里斯克海关办事处，乌苏里斯克海关1号特殊海关程序部:",
                    text: "电话/传真: +7 (423) 202-25-23, +7 (423) 202-25-24"}
            ]
        }
    },
    computed: {
        pageDescription() {
            return this.page_data['page_description'];
        },
        svh() {
            const title = this.$store.state.lang === 'ru' ? "Склад временного хранения (СВХ)" : "监管库";
            const item = this.$store.state.lang === 'ru' ? this.svhItem : this.svhItemCn;
            return {
                title: title,
                item: item,
            }
        },
        htk() {
            const title = this.$store.state.lang === 'ru' ? "ООО «Хасанская транспортная компания»" : "";
            const item = this.$store.state.lang === 'ru' ? this.htkItem : this.htkItemCn;
            return {
                title: title,
                item: item,
            }
        },
        tp() {
            const title = this.$store.state.lang === 'ru' ? "Таможенный представитель" : "报关代理";
            const item = this.$store.state.lang === 'ru' ? this.tpItem : this.tpItemCn;
            return {
                title: title,
                item: item,
            }
        },
        additional() {
            const title = this.$store.state.lang === 'ru' ? "Дополнительная информация" : "其他信息";
            const item = this.$store.state.lang === 'ru' ? this.additionalItem : this.additionalItemCn;
            return {
                title: title,
                item: item,
            }
        },
    },
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
