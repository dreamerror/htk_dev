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
                        :required="true">
                </text-input>

                <button type="submit">
                    Проверить
                </button>
            </form>
            <div v-if="isLoading" class="spinner">
                Загрузка...
            </div>
            <div v-if="internalStatus" class="internal-message">
                {{ internalStatus }}
            </div>
            <div v-if="externalStatus" class="external-message">
                {{ externalStatus }}
            </div>
            <div v-if="reasonMessage" class="reason-message">
                {{ reasonMessage }}
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
            isLoading: false,
            errorMessage: "",
            internalStatus: "",
            externalStatus: "",
            reasonMessage: "",
            statusCodes: {
                "new": "Загружена, ожидает таможенного оформления",
                "uploaded_to_registration": "Отправлена в таможню",
                "decision_was_made": "Принято решение",
                "exds10": "Выпуск товаров без уплаты таможенных платежей",
                "exds30": "Выпуск возвращаемых товаров разрешен",
                "exds31": "Требуется уплата таможенных платежей",
                "exds32": "Выпуск товаров разрешен, таможенные платежи уплачены",
                "exds40": "Разрешение на отзыв",
                "exds50": "Предварительное решение. Выпуск разрешен без уплаты таможенных платежей",
                "exds51": "Предварительное решение. Выпуск с уплатой таможенных платежей",
                "exds60": "Срок выпуска товаров приостановлен",
                "exds61": "Срок приостановления срока выпуска товаров продлен",
                "exds62": "Приостановление срока выпуска товаров отменено",
                "exds70": "Продление срока выпуска",
                "exds90": "Отказ в выпуске товаров",
                "exds92": "Требуется таможенный контроль",
            }
        }
    },
    methods: {
        async handleSubmit() {
            let trackNumber = document.getElementById("cargonum").value;
            if (!trackNumber) {
                return;
            }

            this.isLoading = true;
            this.errorMessage = "";

            try {
                const response = await fetch(`https://htk.deklarant.ru/api/external/parcel-status/${trackNumber}`, {
                    method: "GET",
                    headers: {
                        "api-token": "40e2f498-450c-4b9f-a509-7f4c8877a6ff"
                    }
                });
                if (!response.ok) {
                    this.isLoading = false;
                    this.errorMessage = "При получении данных произошла ошибка, пожалуйста, попробуйте позже";
                }
                if (response.status == 204) {
                    this.isLoading = false;
                    this.errorMessage = "Отправление с этим номером не найдено";
                } else {
                    const result = await response.json();
                    this.internalStatus = this.statusCodes[result.internalStatus];
                    if (result.internalStatus == "decision_was_made") {
                        this.externalStatus = this.statusCodes[result.externalStatus];

                        if (result.externalStatus == "exds90") {
                            this.reasonMessage = result.reasonMessage
                        }
                    }
                    
                }
            } catch (error) {
                this.isLoading = false;
                this.errorMessage = "При получении данных произошла ошибка, пожалуйста, попробуйте позже";
            }
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

    .internal-message, .external-message, .reason-message {
        margin-top: 1rem;
        font-size: 1rem;
    }

</style>
