<template>
    <div>
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" href="#" :class="{'active': activeTab === 'general','show': activeTab === 'general'}" @click="activeTab = 'general'">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" :class="{'active': activeTab === 'reviews','show': activeTab === 'reviews'}" @click="activeTab = 'reviews'">Reviews</a>
                    </li>
                </ul>
                <div class="tab-content mt-3" id="myTabContent">
                    <general ref="general" class="tab-pane fade" @setParams="setParams" :class="{'active': activeTab === 'general','show': activeTab === 'general'}" :product="product" :errors="errors"></general>
                    <reviews class="tab-pane fade" :reviews_list="reviews" :class="{'active': activeTab === 'reviews','show': activeTab === 'reviews'}" :product_id="product.intProductID"></reviews>
                </div>
            </div>
        </div>
        <button class="btn btn-primary mt-1" @click="save()" type="button">{{ product.intProductID === 0 ? 'Create' : 'Update' }} Product</button>
    </div>
</template>

<script>

    import General from "./GeneralComponent";
    import Reviews from "./ReviewsComponent";

    export default {
        props: ['id'],
        components: {
            Reviews,
            General,
        },
        data() {
            return {
                product: {
                    intProductID: 0,
                    intCatID: null,
                    varName: null,
                    varSubtitle: null,
                    varAuthor: null,
                    varYoutubeCode: null,
                    varSlug: null,
                    varMainImage: null,
                    varThumbnailImage: null,
                    varDescription: null,
                    varPrice: 0,
                    intRating: 0,
                    isEnabled: false,
                    isNew: false,
                    isCheapest: false,
                    isBestSelling: false,
                    isLatest: false,
                },
                reviews: [],
                errors: {},
                activeTab: 'general',
            };
        },
        mounted() {
            if (this.id) {
                this.loadProduct();
            }
        },
        methods: {
            loadProduct() {
                this.$http.get(`/admin/products/find/${this.id}`).then(response => {
                    this.product = response.data.data.product;

                    for (let review of response.data.data.product.reviews) {
                        this.reviews.push(review);
                    }

                    this.$refs.general.setCategory(this.product.intCatID);
                }, () => {
                    alert( 'Something went wrong. Send a message in support.');
                });
            },
            save() {
                this.errors = {};

                if (this.product.intProductID === 0) {
                    this.store();
                } else {
                    this.update();
                }
            },
            store() {
                this.$http.post('/admin/products/store', this.compactParams()).then(response => {
                    window.location.href = response.data.data.link;
                }, response => this.showErrors(response.data.errors));
            },
            update() {
                this.$http.put(`/admin/products/update/${this.product.intProductID}`, this.compactParams()).then(() => {
                    this.$dialogs.alert('Updated', {
                        title: 'Info',
                        size: 'sm'
                    });
                }, response => this.showErrors(response.data.errors));
            },
            showErrors(errors) {
                this.errors = errors;
            },
            compactParams() {
                let reviewsIds = this.reviews.map(review => review.intReviewID);

                return {
                    product: this.product,
                    reviewsIds: reviewsIds,
                };
            },
            hasError(key) {
                return this.errors.hasOwnProperty(key);
            },
            setParams(key, value) {
                this.product[key] = value;
            }
        }
    }
</script>
