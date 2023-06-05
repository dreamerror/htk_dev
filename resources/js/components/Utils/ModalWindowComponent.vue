<template>
    <transition name="modal">
        <div class="modal-overlay" @click="$emit('close-modal')">
            <div class="modal-wrapper" @click.stop>
                <h3>
                    Оставьте свои данные, и с вами свяжутся!
                </h3>
                <form method="post" :action="api">
                    <text-input
                        v-for="(input, index) in inputs"
                        :key="index"
                        :label="input.label"
                        :placeholder="input.placeholder"
                        :name="input.name"
                        :required="input.required">

                    </text-input>

                    <button type="submit">
                        Отправить
                    </button>

                </form>
            </div>
        </div>
    </transition>
</template>

<script>
export default {
    name: "ModalWindowComponent",
    props: {
        api: String,
    },
    data() {
        return {
            inputs: [
                {label: 'Ваше имя', placeholder: 'Введите имя:', name: 'name', required: true},
                {label: 'Номер телефона', placeholder: 'Введите номер телефона:', name: 'phone', required: true},
                {label: 'Вопрос (необязательно)', placeholder: 'Задайте вопрос, на который хотите получить ответ:',
                    name: 'question', required: false},
            ]
        }
    }
}
</script>

<style scoped lang="scss">

    .modal-overlay {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #000000da;
        z-index: 200;
    }

    .modal-wrapper {
        text-align: center;
        background-color: white;
        height: 50%;
        width: 50%;
        padding: 2rem 2rem;
        border-radius: 20px;
        z-index: 300;
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

    .modal-enter-active, .modal-leave-active {
        transition: opacity .5s
    }

    .modal-enter, .modal-leave-to {
        opacity: 0
    }

</style>
