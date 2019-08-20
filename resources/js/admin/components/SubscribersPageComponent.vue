<template>
    <div>
        <table class="table table-hover progress-table text-center">
            <thead class="text-uppercase">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Email</th>
                <th scope="col">Date</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <tr v-for="subscriber in subscribers">
                <th scope="row">{{ subscriber.intSubscriberID }}</th>
                <td>{{ subscriber.varEmail }}</td>
                <td>{{ subscriber.created_at }}</td>
                <td>
                    <ul class="d-flex justify-content-center">
                        <li>
                            <a href="#" class="text-danger" @click="deleteSubscriber(subscriber.intSubscriberID)">
                                <i class="ti-trash"></i>
                            </a>
                        </li>
                    </ul>
                </td>
            </tr>

        </table>

        <div class="mt-3" v-if="pagination.count > 1">
            <paginate
                v-model="pagination.currentPage"
                :page-count="pagination.count"
                :page-range="16"
                :margin-pages="8"
                :click-handler="loadSubscribers"
                :prev-text="'Prev'"
                :next-text="'Next'"
                :container-class="'pagination pg-color-border'"
                :page-class="'page-item'"
                :page-link-class="'page-link'"
                :prev-class="'page-item'"
                :prev-link-class="'page-link'"
                :next-class="'page-item'"
                :next-link-class="'page-link'"
            >
            </paginate>
        </div>

    </div>
</template>

<script>
    export default {
        name: "SubscribersPageComponent",
        data() {
            return {
                pagination: {
                    currentPage: 1,
                    count: 0,
                },
                subscribers: []
            };
        },
        mounted() {
            this.loadSubscribers();
        },
        methods: {
            loadSubscribers() {
                let params = {
                    page: this.pagination.currentPage,
                };

                this.$http.get('/admin/subscribers/list', {params: params}).then(response => {

                    this.subscribers = response.data.data.subscribers;
                    this.pagination = response.data.data.pagination;
                    this.imagePrefix = response.data.data.imagePrefix;

                }, () => {
                    alert('Something went wrong. Send a message in support.');
                });
            },
            deleteSubscriber(intSubscriberID) {
                this.$http.delete(`/admin/subscribers/delete/${intSubscriberID}`).then(() => {
                    let index = this.subscribers.findIndex(subscriber => subscriber.intSubscriberID === intSubscriberID);

                    if (index !== -1) {
                        this.subscribers.splice(index, 1);
                        if (this.subscribers.length === 0) {
                            this.loadSubscribers();
                        }
                    }
                });
            }
        }
    }
</script>
