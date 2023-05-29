<template>
    <div class="partner-wrapper">
        <div class="partner-logo">
            <img :src="logo" alt="">
        </div>
    </div>
</template>

<script>
export default {
    name: "PartnerCardComponent",
    props: {
        logo: String,
    }
}
</script>

<style scoped lang="scss">

    .partner-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #ffffff;
        width: 15vw;
        aspect-ratio: 1;
        border-radius: 15px;
    }

    .partner-logo {
        width: 90%;
        height: 90%;
        display: flex;
        align-items: center;
        justify-content: center;

        img {
            width: 80%;
            aspect-ratio: auto;
        }
    }

    @media(max-width: 900px) {
        .partner-wrapper {
            width: 30vw;
        }
    }

</style>
