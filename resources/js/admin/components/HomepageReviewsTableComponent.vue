<template>
    <div>
        <table class="table table-hover progress-table text-center">
            <thead class="text-uppercase">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Link</th>
                <th scope="col">Position</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <draggable v-model="reviews" tag="tbody" @end="saveSort">
                <tr v-for="review in reviews" :key="reviews.intReviewID">
                    <th scope="row">{{ review.intReviewID }}</th>
                    <td>{{ review.varName }}</td>
                    <td><a :href="review.varLink" target="_blank">{{ review.varLink }}</a></td>
                    <td>{{ review.varPosition }}</td>
                    <td>
                        <span :class="{'bg-success':review.isEnabled === 1,'bg-primary':review.isEnabled === 0}" class="status-p">{{ review.isEnabled === 1 ? 'Active' : 'No Active' }}</span>
                    </td>
                    <td>
                        <ul class="d-flex justify-content-center">
                            <li class="mr-3">
                                <a href="#" class="text-secondary" @click="edit(review.intReviewID)">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-danger" @click="deleteReview(review.intReviewID, review.varName)">
                                    <i class="ti-trash"></i>
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            </draggable>
        </table>

    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        name: "HomepageReviewsTable",
        components: {
            draggable,
        },
        data() {
            return {
                reviews: [],
            };
        },
        mounted() {
            this.$http.get('/admin/homepage-reviews/list').then(response => {

                this.reviews = response.data.data.reviews;

            }, () => {
                alert( 'Something went wrong. Send a message in support.');
            });
        },
        methods: {
            saveSort() {
                let sortedReviews = this.reviews.map(review => review.intReviewID);

                this.$http.post('/admin/homepage-reviews/save-sort', {reviews: sortedReviews});
            },
            deleteReview(intReviewID, varName) {
                const options = {
                    title: 'Confirm?',
                    cancelLabel: 'No'
                };

                this.$dialogs.confirm(`Are you sure you want to delete the "${varName}" review?`, options)
                    .then(res => {
                        if (res.ok === true) {
                            this.$http.delete(`/admin/homepage-reviews/delete/${intReviewID}`).then(() => {
                                let index = this.reviews.find(review => {
                                    return review.intReviewID === intReviewID;
                                });

                                this.reviews = this.reviews.splice(index, 1);
                            });
                        }
                    })
                ;
            },
            edit(intReviewID) {
                window.location.href = `/admin/homepage-reviews/edit/${intReviewID}`;
            }
        }
    }
</script>
