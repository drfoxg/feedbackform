<template>
    <div>
        <h1>Форма обратной связи</h1>
        <div v-if="error">
            <div class="list-for" v-for="(errorItem, errorIndex) in errorList">
                <div class="alert error">
                    <input type="checkbox" :id="'alert'+errorIndex"/>
                    <label class="close" title="close" :for="'alert' + errorIndex">
                        <i class="icon-remove"></i>
                    </label>
                    <p class="inner">
                        <strong>Warning!</strong> {{ errorItem.toString() }}
                    </p>
                </div>
            </div>
        </div>

        <div v-if="ok">
            <div class="alert success">
                <input type="checkbox" id="alert10"/>
                <label class="close" title="close" for="alert10">
                    <i class="icon-remove"></i>
                </label>
                <p class="inner">
                    Message send successfully.
                </p>
            </div>
        </div>

        <div>
            <form method="post" action="#">
                <div class="form-group">
                    <label for="username">Имя:</label><br/>
                    <input type="text" class="form-control w-100 p-3" id="username" name="form.username"
                           v-model="form.username"/>
                </div>
                <label for="phone">Телефон:</label><br/>
                <div class="phone-group">
                    <select class="country form-select" name="form.countryId" v-model="form.countryId">
                        <option disabled selected>Выберите страну</option>
                        <option value="177" selected>7 RU</option>
                        <option value="223" selected>380 UA</option>
                        <option value="226" selected>1 US</option>
                    </select>
                    <div class="form-group">
                        <input type="text" class="form-control w-100 p-3" id="phone" name="form.phone"
                               v-model="form.phone"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Сообщение:</label><br/>
                    <textarea cols="40" rows="10" class="form-control" id="message" name="form.message"
                              v-model="form.message"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary button_buy" value="Отправить" @click.prevent="store">
                    <input type="reset" class="btn btn-primary button_buy" value="Очистить поля">
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name: "CreateFeedback",

    data: () => ({
        form: {
            countryId: "",
            username: "",
            phone: "",
            message: ""
        },
        error: false,
        ok: false,
        errorList: []
    }),

    methods: {
        store() {
            console.log(this.api);

            let lastStore = 0;
            let urls = [];

            this.api.forEach((apiPath, apiStatus) => {
                let isOn = apiStatus.slice(0, -1);
                if (isOn === 'on') {
                    urls[lastStore] = apiPath;
                    lastStore++;
                    console.log(`For ${apiStatus} we had ${apiPath}.`)
                }
            });

            for (let i = 0; i < lastStore - 1; i++) {
                axios.post(urls[i], this.form,
                    {
                        headers:
                            {"Content-type": "application/json"}
                    })
                    .then(res => {
                        if (res.data.status) {

                        }
                    })
                    .catch(err => {
                        this.error = true;
                        this.ok = false;
                        this.errorList = err.response.data.error;

                        console.log(err.response.data);
                    });
            } //for

            axios.post(urls[lastStore - 1], this.form, {
                headers: {
                    "Content-type": "application/json"
                }
            })
                .then(res => {
                    if (res.data.status) {
                        this.form.countryId = '';
                        this.form.username = '';
                        this.form.phone = '';
                        this.form.message = '';
                        this.error = false;
                        this.ok = true;
                        this.$router.push('/').catch(err => {
                            if (err.name !== 'NavigationDuplicated' &&
                                !err.message.includes('Avoided redundant navigation to current location')) {
                                console.log(err);
                            }
                        });
                    }
                })
                .catch(err => {
                    this.error = true;
                    this.ok = false;
                    this.errorList = err.response.data.error;

                    console.log(err.response.data);
                });
        }
    }
}
</script>

<style scoped>

</style>
