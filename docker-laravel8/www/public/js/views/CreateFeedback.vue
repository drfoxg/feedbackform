<template>
    <div>
        <form method="post" action="#">
            <div class="form-group">
                <label for="username">Имя:</label>
                <input type="text" class="form-control" name="username"/>
            </div>
            <div class="form-group">
                <label for="phone">Телефон:</label>
                <input type="number" class="form-control" name="phone"/>
            </div>
            <div class="form-group">
                <label for="message">Item Price :</label>
                <input type="text" class="form-control" name="message"/>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
</template>

<script>
export default {
    name: "FeedbackForm"
}
</script>

<style scoped>

</style>
