<template>
<div class="table-responsive">
    <table class="table table-nowrap mb-0">
        <tbody>
            <tr>
                <th scope="row" style="width: 400px;">Noifications</th>
                <td>
                    <div class="center con-switch col-md-2">
                        <vs-switch v-model="appsettings.notifications">
                            <template #off>Off</template>
                            <template #on>On</template>
                        </vs-switch>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row">Products Update</th>
                <td>
                    <div class="center con-switch col-md-2">
                        <vs-switch v-model="appsettings.product_updates">
                            <template #off>Off</template>
                            <template #on>On</template>
                        </vs-switch>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row">News and Info</th>
                <td>
                    <div class="center con-switch col-md-2">
                        <vs-switch v-model="appsettings.news_infos">
                            <template #off>Off</template>
                            <template #on>On</template>
                        </vs-switch>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row">Shortage List</th>
                <td>
                    <div class="center con-switch col-md-2">
                        <vs-switch v-model="appsettings.shortage_lists">
                            <template #off>Off</template>
                            <template #on>On</template>
                        </vs-switch>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row">Expiry</th>
                <td>
                    <div class="center con-switch col-md-2">
                        <vs-switch v-model="appsettings.product_expiry">
                            <template #off>Inactive</template>
                            <template #on>Active</template>
                        </vs-switch>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row">POS - Demo</th>
                <td>
                    <div class="center con-switch col-md-2">
                        <vs-switch v-model="appsettings.pos_demos">
                            <template #off>Inactive</template>
                            <template #on>Active</template>
                        </vs-switch>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>

    <button @click="saveSettings" class="btn btn-primary">SAVE SETTINGS</button>
</div>
</template>

<script>
import {
    mapGetters,
    mapActions
} from "vuex";
export default {
    data() {
        return {
            appsettings: {
                notifications: false,
                product_updates: false,
                news_infos: false,
                shortage_lists: false,
                pos_demos: false,
                product_expiry: false,
            }
        };
    },
    methods: {
        saveSettings() {
            this.$store.dispatch('appsettings/saveAppSettings', this.appsettings)
        },
        getActiveChecker(checker) {
            if (checker) {
                return true;
            }
            return false
        },
        ...mapActions('appsettings', ['getAppAllSettings'])
    },
    computed: {
        ...mapGetters('appsettings', ['getAppSettings'])
    },
    mounted() {
        this.getAppAllSettings
        this.appsettings = this.getAppSettings;
    },
};
</script>

<style>
</style>
