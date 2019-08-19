<template>
    <div>
        <div class="counter-page--items">
            <div class="counter-page--item" v-for="(counter,index) in counters">
                <div class="form-group">
                    <label for="varName" class="col-form-label">Name</label>
                    <input class="form-control" type="text" v-model="counter.varName" id="varName">
                </div>

                <div class="form-group">
                    <label for="intValue" class="col-form-label">Value</label>
                    <input class="form-control" type="text" v-model="counter.intValue" id="intValue">
                </div>

                <div class="custom-control custom-checkbox mt-2">
                    <input type="checkbox" v-model="counter.isEnabled" class="custom-control-input" id="isEnabled">
                    <label class="custom-control-label" for="isEnabled">Active: {{ counter.isEnabled ? 'Yes' : 'No' }}</label>
                </div>

                <button class="btn btn-primary mt-1" @click="save(index)" type="button">Save</button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CounterPageComponent",
        data() {
            return {
                counters: [],
            };
        },
        created() {
            this.$http.get('/admin/counters/list').then(response => {
                this.counters = response.data.data.counters;
            });
        },
        methods: {
            save(index) {
                let counter = this.counters[index];

                let counterData = {
                    varName: counter.varName,
                    intSort: counter.intSort,
                    intValue: counter.intValue,
                    isEnabled: Number(counter.isEnabled),
                };

                this.$http.post(`/admin/counters/update/${counter.varAlias}`, counterData).then(() => {
                    this.$dialogs.alert('Saved', {
                        title: 'Info',
                        size: 'sm'
                    });
                });
            }
        }
    }
</script>
