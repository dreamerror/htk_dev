<template>
    <div class="login-wrapper">
        <h3>
            Регистрация нового пользователя
        </h3>
        <form method="post" :action="action_url">
            <input type="text" name="username" placeholder="Логин: " required>
            <input type="password" name="password" placeholder="Пароль: " required>
            <input type="submit">
        </form>
    </div>
</template>

<script>

export default {
    name: "RegisterPageComponent",
    props: {
        action_url: String,
    }
}

</script>

<style scoped lang="scss">

    .login-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-items: center;
        gap: 1vh;
    }

</style>
