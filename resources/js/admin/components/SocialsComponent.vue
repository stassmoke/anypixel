<template>
    <div>
        <div class="socials-page--items">
            <draggable v-model="socials" tag="div" @end="saveSort">
                <div class="social-page--item" v-for="(social,index) in socials">
                    <div class="social-page--item-nav">
                        <span class="ti-line-double"></span>
                        <span @click="deleteSocial(index)" class="ti-trash"></span>
                    </div>
                    <div class="form-group">
                        <label for="varName" class="col-form-label">Name</label>
                        <input class="form-control" type="text" v-model="social.varName" id="varName">
                    </div>

                    <div class="form-group">
                        <label for="varIcon" class="col-form-label">Icon</label>
                        <input class="form-control" type="text" v-model="social.varIcon" id="varIcon">
                    </div>

                    <div class="form-group">
                        <label for="varLink" class="col-form-label">Link</label>
                        <input class="form-control" type="url" v-model="social.varLink" id="varLink">
                    </div>

                    <button class="btn btn-primary mt-1" @click="save(index)" type="button">
                        {{ social.intSocialID === null ? 'Create' : 'Save' }}
                    </button>
                </div>
            </draggable>
        </div>

        <button class="btn btn-primary mt-1" @click="addSocial()" type="button">Add Social</button>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        name: "SocialsComponent",
        components: {
            draggable,
        },
        data() {
            return {
                socials: [],
            };
        },
        mounted() {
            this.$http.get('/admin/socials/list').then(response => {

                this.socials = response.data.data.socials;

            }, () => {
                alert( 'Something went wrong. Send a message in support.');
            });
        },
        methods: {
            save(index) {
                const social = this.socials[index];

                if (social.intSocialID === null) {
                    this.create(social, index);
                } else {
                    this.update(social);
                }
            },
            deleteSocial(index) {
                const social = this.socials[index];

                if (social.intSocialID !== null) {
                    this.$http.delete(`/admin/socials/delete/${social.intSocialID}`);
                }

                this.socials.splice(index, 1);
            },
            addSocial() {
                this.socials.push({
                    intSocialID: null,
                    varName: null,
                    varIcon: null,
                    varLink: null,
                    intSort: this.socials.length,
                });
            },
            saveSort() {
                let sortedSocials = this
                    .socials
                    .map(social => social.intSocialID)
                    .filter(intSocialID => intSocialID !== null)
                ;

                this.$http.post('/admin/socials/save-sort', {socials: sortedSocials});
            },
            create(social, index) {
                this.$http.post('/admin/socials/create', {social: social}).then(response => {
                    this.socials[index].intSocialID = response.data.data.social.intSocialID;

                    this.$dialogs.alert('Created', {
                        title: 'Info',
                        size: 'sm'
                    });
                });
            },
            update(social) {
                this.$http.put(`/admin/socials/update/${social.intSocialID}`, {social: social}).then(() => {
                    this.$dialogs.alert('Saved', {
                        title: 'Info',
                        size: 'sm'
                    });
                });
            },
        }
    }
</script>
