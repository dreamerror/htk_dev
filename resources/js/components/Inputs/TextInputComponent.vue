<template>
    <div class="text-field">
        <label class="text-label" :for="name">{{ label }}</label>
        <input class="text-input" type="text" :name="name" :id="name" :placeholder="placeholder"
        :required="required">
    </div>
</template>

<script>
export default {
    name: "TextInputComponent",
    props: {
        label: String,
        placeholder: String,
        name: String,
        required: {
            type: Boolean,
            default: false,
        }
    }
}
</script>

<style scoped lang="scss">

    .text-field {
        margin-bottom: 1rem;
    }

    .text-label {
        display: block;
        margin-bottom: 0.25rem;
    }

    .text-input {
        display: block;
        width: 100%;
        height: calc(2.25rem + 2px);
        padding: 0.375rem 0.75rem;
        font-family: inherit;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #212529;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #bdbdbd;
        border-radius: 0.25rem;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }

</style>
