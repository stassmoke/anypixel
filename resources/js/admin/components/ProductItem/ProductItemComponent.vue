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
                    <general class="tab-pane fade" :class="{'active': activeTab === 'general','show': activeTab === 'general'}" :product_item="product" :errors="errors"></general>
                    <reviews class="tab-pane fade" :class="{'active': activeTab === 'reviews','show': activeTab === 'reviews'}"></reviews>
                </div>
            </div>
        </div>

        <button class="btn btn-primary mt-1" @click="createCategory()" type="button">Create Product</button>
    </div>
</template>

<script>

    import General from "./GeneralComponent";
    import Reviews from "./ReviewsComponent";

    export default {
        components: {
            Reviews,
            General,
        },
        data() {
            return {
                product: {
                    intProductID: null,
                    intCatID: null,
                    varName: '',
                    varSubtitle: '',
                    varYoutubeCode: '',
                    varSlug: '',
                    varLink: '',
                    varMainImage: null,
                    varThumbnailImage: null,
                    varDescription: '',
                    varPrice: '',
                    intRating: '',
                    isEnabled: false,
                    isNew: false,
                    isCheapest: false,
                    isBestSelling: false,
                },
                errors: {},
                activeTab: 'general',
            };
        },
        methods: {

        }
    }
</script>
