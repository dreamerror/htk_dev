<template>
    <div class="check-wrapper">

        <header-pages
            :bg_image="bg.src"
            :url="url"
            :content="''">

        </header-pages>

        <div class="page-content">
            <form @submit.prevent="handleSubmit">
                <text-input
                        label="Проверить статус отправления"
                        placeholder="Введите трек-номер"
                        name="cargonum"
                        v-model="trackNumber"
                        :required="true">
                </text-input>

                <button type="submit">
                    Проверить
                </button>
            </form>
            <div v-if="isLoading" class="spinner">
                Загрузка...
            </div>
            <div v-if="errorMessage" class="error-message">
                {{ errorMessage }}
            </div>
        </div>

    </div>
</template>

<script>
export default {
    name: "CheckPageComponent",
    props: {
        url: String,
        bg: Object,
    },
    data() {
        return {
            trackNumber: "",
            isLoading: false,
            errorMessage: ""
        }
    },
    methods: {
        handleSubmit() {
            if (!this.trackNumber) {
                return;
            }

            this.isLoading = true;
            this.errorMessage = "";
            
            setTimeout(() => {
                this.isLoading = false;
                this.errorMessage = "Отправления по данному трек-номеру не существует. Проверьте правильность введенной информации.";
            }, 1000)
        }
    }
}
</script>

<style scoped lang="scss">

    .check-wrapper {
        display: flex;
        flex-direction: column;
        gap: 3vh;
        //padding: 5vh 10vw;
    }

    .page-content {
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    button {
        display: inline-block;
        font-weight: 400;
        line-height: 1.5;
        color: #fff;
        text-align: center;
        text-decoration: none;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        background-color: #0d6efd;
        border: 1px solid #0d6efd;
        padding: .375rem .75rem;
        font-size: 1rem;
        border-radius: .25rem;
        transition: background-color .15s ease-in-out;
    }

    button:hover {
        color: #fff;
        background-color: #0b5ed7;
        border-color: #0a58ca;
    }

    .spinner {
        margin-top: 1rem;
        font-size: 1rem;
        color: #0d6efd;
    }

    .error-message {
        margin-top: 1rem;
        font-size: 1rem;
        color: red;
    }

</style>
