<template>
    <div class="header bg-light mb-auto">

        <div class="logo">
          <a href="/"><img src="img/logo.jpg" alt="logo"></a>
        </div>

        <nav>
            <ul class="menu">
                <li v-for="link in links">
                    <!-- <a :href = "link.href">{{ link.title }}</a> -->
                    <router-link :to = "link.href">{{ link.title }}</router-link>
                </li>
            </ul>
        </nav>

        <div class="clear"></div>
        <hr>

    </div>
</template>

<script>
export default {
    name: "Header",
    data() {
        return {
            links: [
                {
                    title: "Главная",
                    href: "/public"
                },
                {
                    title: "Сообщения",
                    href: "/messages"
                },
                {
                    title: "Контакты",
                    href: "/contacts"

                }

            ]
        }
    }
}
</script>

<style scoped>

</style>
