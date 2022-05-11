<template>
    <div>
        <h1>Сообщения из формы</h1>
        <div class="list-for" v-for="feedback in feedbacks">
            <h3 class="list-username">{{feedback.username}}</h3>
            <div class="list-phone">
                Телефон: {{feedback.countryId}}{{feedback.phone}}
            </div>
            <div class="list-message">
                Отзыв:<br/>
                {{feedback.message}}
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "Messages",

        data: () => ({
            feedbacks: [],
            countries: []
        }),

        mounted() {
            this.loadFeedback();
            this.loadCountry();
        },

        methods: {
            loadFeedback() {
                axios.get('/api/feedback_new')
                    .then(res => {
                        this.feedbacks = res.data;
                        console.log(res.data)
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            },
            loadCountry() {
                axios.get('/api/country')
                    .then(res => {
                        this.countries = res.data;

                        this.feedbacks.forEach(entry => {
                            entry.countryId = res.data[entry.countryId - 1].phonecode;
                        });

                        console.log(res.data)
                    })
                    .catch(function (error) {
                        console.log(error)
                    })
            }
        }
    }
</script>

<style scoped>

</style>
