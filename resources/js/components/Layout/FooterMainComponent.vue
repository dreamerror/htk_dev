<template>
    <div class="main-footer-wrapper">
            <img src="/storage/berkut-footer.svg" class="footer-berkut" alt="Berkut">
            <img src="/storage/htk-footer.svg" class="footer-htk" alt="HTK">

            <div class="footer-contacts">
                <span class="title">
                    Наш офис:
                </span>
                <span v-for="item in officeElements"
                :key="item.text"
                @click="callbacks[item.type](item.text)">

                    <i class="fa fa-envelope" aria-hidden="true" v-if="item.type === 'email'"></i>
                    <i class="fa fa-map-marker" aria-hidden="true" v-if="item.type === 'address'"></i>
                    <i class="fa fa-phone" aria-hidden="true" v-if="item.type === 'phone'"></i>

                    {{item.text}}

                </span>

            </div>

            <div class="footer-contacts">
                <span class="title">
                    СВХ:
                </span>
                <span v-for="item in svhElements"
                      :key="item.text"
                      @click="callbacks[item.type](item.text)">

                    <i class="fa fa-envelope" aria-hidden="true" v-if="item.type === 'email'"></i>
                    <i class="fa fa-map-marker" aria-hidden="true" v-if="item.type === 'address'"></i>
                    <i class="fa fa-phone" aria-hidden="true" v-if="item.type === 'phone'"></i>

                    {{item.text}}

                </span>


            </div>

            <div class="footer-contacts">
                <span class="title">
                    Перевозки «Беркут»:
                </span>
                <span v-for="item in berkutElements"
                      :key="item.text"
                      @click="callbacks[item.type](item.text)">

                    <i class="fa fa-envelope" aria-hidden="true" v-if="item.type === 'email'"></i>
                    <i class="fa fa-map-marker" aria-hidden="true" v-if="item.type === 'address'"></i>
                    <i class="fa fa-phone" aria-hidden="true" v-if="item.type === 'phone'"></i>

                    {{item.text}}

                </span>

            </div>

            <div class="footer-contacts">
                <span class="title">
                    Таможенный представитель:
                </span>
                <span v-for="item in tpElements"
                      :key="item.text"
                      @click="callbacks[item.type](item.text)">

                    <i class="fa fa-envelope" aria-hidden="true" v-if="item.type === 'email'"></i>
                    <i class="fa fa-map-marker" aria-hidden="true" v-if="item.type === 'address'"></i>
                    <i class="fa fa-phone" aria-hidden="true" v-if="item.type === 'phone'"></i>

                    {{item.text}}

                </span>
            </div>

    </div>

</template>

<script>
export default {
    name: "FooterMainComponent",
    props: {
        items: Array,
    },
    data() {
        return {
            callbacks: {
                phone: this.phoneClickHandler,
                email: this.mailClickHandler,
                address: this.addressClickHandler,
            }
        }
    },
    computed: {
        officeElements() {
            return this.items.filter(function(e) {return e.position === 'office'})
        },
        svhElements() {
            return this.items.filter(function(e) {return e.position === 'svh'})
        },
        berkutElements() {
            return this.items.filter(function(e) {return e.position === 'berkut'})
        },
        tpElements() {
            return this.items.filter(function(e) {return e.position === 'tp'})
        },
    },
    methods: {
        phoneClickHandler(phone) {
            window.location.assign(`tel:${phone}`)
        },
        mailClickHandler(email) {
            window.location.assign(`mailto:${email}`)
        },
        addressClickHandler() {
            return undefinded;
        }
    }
}

</script>

<style scoped lang="scss">

    .main-footer-wrapper {
        width: 100%;
        background: #316851;
        display: grid;
        grid-template-columns: 1fr 1fr repeat(4, 2fr);
        padding: 1vh 1vw;

        img {
            width: 50%;
            aspect-ratio: 1;
        }
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

        span {
            text-decoration: none;
            color: #ffffff;
            font-weight: 400;
            font-size: 16px;
            line-height: 24px;
            transition: all .3s linear;
            cursor: pointer;
        }

        span:hover {
            color: #d1a251
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
