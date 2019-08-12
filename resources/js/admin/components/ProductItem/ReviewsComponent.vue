<template>
    <div>
        <div class="product-reviews">
            <div class="product-review" v-for="(review,key) in reviews">
                <p>{{ review.varName }}</p>
                <p v-html="review.varComment"></p>
                <star-rating class="product-reviews-stars" :show-rating="false" :read-only="true" v-model="review.intRating"></star-rating>
                <div class="product-review-control">
                    <img src="/admin/img/x-button.svg" alt="remove" @click="remove(key)">
                    <img src="/admin/img/pencil.svg" alt="pencil" @click="edit(key)">
                </div>
            </div>
        </div>

        <div class="product-add-review">
            <p v-if="activeReviewKey === null">Add new Review</p>
            <p v-else>Edit Review {{ reviews[activeReviewKey].varName }}</p>

            <div class="form-group">
                <label for="varName" class="col-form-label">Name</label>
                <input class="form-control" type="text" v-model="activeReview.varName" id="varName">
            </div>

            <div class="form-group">
                <star-rating class="product-reviews-stars" :show-rating="false" v-model="activeReview.intRating"></star-rating>
            </div>

            <div class="form-group">
                <label for="varComment" class="col-form-label">Comment</label>
                <vue-editor id="varComment" v-model="activeReview.varComment"></vue-editor>
            </div>

            <button class="btn btn-primary btn-xs mt-1" @click="saveUpdate()" type="button">{{ activeReviewKey === null ? 'Save' : 'Update'}} review</button>
            <button class="btn btn-primary btn-xs mt-1" :class="{'hidden':isAvailableClear() === false}" @click="clearActiveAction()" type="button">Clear review</button>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Reviews",
        props: ['reviews_list','product_id'],
        data() {
            return {
                reviews: [],
                activeReview: {
                    intReviewID: null,
                    varName: null,
                    intRating: null,
                    varComment: null,
                },
                activeReviewKey: null,
            };
        },
        created() {
            this.reviews = this.reviews_list;
        },
        methods: {
            add() {

            },
            edit(key) {
                this.activeReviewKey = key;
                this.activeReview = Object.assign({}, this.reviews[key]);
            },
            remove(key) {
                if (this.activeReviewKey === key) {
                    this.activeReviewKey = null;
                }

                if (key in this.reviews) {
                    this.$http.delete(`/admin/product-reviews/delete/${this.reviews[key].intReviewID}`).then(() => {
                        this.reviews.splice(key, 1);
                    }, () => {
                        alert( 'Something went wrong. Send a message in support.');
                    });
                } else {
                    this.reviews.splice(key, 1);
                }

                this.clearActive();
            },
            clearActive() {
                for (let prop of Object.keys(this.activeReview)) {
                    this.activeReview[prop] = null;
                }
            },
            clearActiveAction() {
                this.clearActive();
                this.activeReviewKey = null;
            },
            isAvailableClear() {
                return Object.keys(this.activeReview).filter(key => {
                    return this.activeReview[key] !== null;
                }).length > 0;
            },
            saveUpdate() {
                let copy = Object.assign({}, this.activeReview);

                let params = {
                    intProductID: this.product_id,
                    review: copy,
                };

                if (this.activeReviewKey === null) {
                    this.createAction(params);
                } else {
                    this.updateAction(params);
                }

                this.clearActiveAction();
            },
            createAction(params) {
                this.$http.post('/admin/product-reviews/store', params).then(response => {
                    this.reviews.push(response.data.data.review);
                }, () => {
                    alert( 'Something went wrong. Send a message in support.');
                });
            },
            updateAction(params) {
                this.$http.put(`/admin/product-reviews/update/${params.review.intReviewID}`, params).then(() => {
                    this.reviews[this.activeReviewKey] = params.review;
                }, () => {
                    alert( 'Something went wrong. Send a message in support.');
                });
            }
        }
    }
</script>
