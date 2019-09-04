<template>
    <div>
        <table class="table table-hover progress-table text-center">
            <thead class="text-uppercase">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Link</th>
                <th scope="col">Image</th>
                <th scope="col">Created At</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
            </thead>

            <draggable v-model="packs" tag="tbody" @end="saveSort">
                <tr v-for="pack in packs"  :key="pack.intPackID">
                    <th scope="row">{{ pack.intPackID }}</th>
                    <td>{{ pack.varName }}</td>
                    <td><a :href="pack.varLink" target="_blank">Open</a></td>
                    <td>
                        <div v-if="pack.varImg !== null" class="product-list-image-block">
                            <img :src="'/storage/images/' + pack.varImg" :alt="pack.varName">
                        </div>
                    </td>
                    <td>{{ pack.created_at }}</td>
                    <td>
                        <span :class="{'bg-success':pack.isEnabled === 1,'bg-primary':pack.isEnabled === 0}" class="status-p">{{ pack.isEnabled === 1 ? 'Active' : 'No Active' }}</span>
                    </td>
                    <td>
                        <ul class="d-flex justify-content-center">
                            <li class="mr-3">
                                <a href="#" class="text-secondary" @click="edit(pack.intPackID)">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="text-danger" @click="deletePack(pack.intPackID, pack.varName)">
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
        name: "AfterEffectsListComponent",
        components: {
            draggable,
        },
        data() {
            return {
                packs: [],
            };
        },
        mounted() {
            this.$http.get('/admin/after-effects-packs/list').then(response => {
                this.packs = response.data.data.packs;
            }, () => {
                alert( 'Something went wrong. Send a message in support.');
            });
        },
        methods: {
            saveSort() {
                let sortedPacks = this.packs.map(category => category.intPackID);

                this.$http.post('/admin/after-effects-packs/save-sort', {packs: sortedPacks});
            },
            deletePack(intPackID, varName) {
                const options = {
                    title: 'Confirm?',
                    cancelLabel: 'No'
                };

                this.$dialogs.confirm(`Are you sure you want to delete the "${varName}" pack?`, options)
                    .then(res => {
                        if (res.ok === true) {
                            this.$http.delete(`/admin/after-effects-packs/delete/${intPackID}`).then(() => {
                                let index = this.packs.find(pack => {
                                    return pack.intPackID === intPackID;
                                });

                                this.packs.splice(index, 1);
                            });
                        }
                    })
                ;
            },
            edit(intPackID) {
                window.location.href = `/admin/after-effects-packs/edit/${intPackID}`;
            }
        }
    }
</script>
